<?php

namespace Modules\Realtime\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Common\Services\LocalFiles;
use Modules\Realtime\Repositories\FriendRepository;
use Modules\Realtime\Repositories\MessageRepository;
use Storage;

class MessagesController extends Controller {

	use LocalFiles;

	public function __construct(MessageRepository $messageRepository, FriendRepository $friendRepository) {
		$this->messageRepository = $messageRepository;
		$this->friendRepository = $friendRepository;
	}

	public function store() {

		$data = request()->validate([

			'sender_id' => 'required|numeric|exists:users,id',
			'reciever_id' => 'required|numeric|exists:users,id',
			'content' => 'required',
			'type' => 'required|in:message,file,image',

		]);

		if ($data['type'] != 'message') {
			$content = $data['content'];
			$data['content'] = 'content';
		}

		$message = $this->messageRepository->create($data);

		if (in_array($data['type'], ['file', 'image'])) {

			$file = explode(',', $content);

			$content = $file[1];

			$ext = explode(';', explode('/', $file[0])[1])[0];

			$content = base64_decode($content);

			$path = 'chat/' . $message->id . '.' . $ext;

			Storage::disk('public_uploads')->put($path, $content);

			$message->update(['content' => url('upload/' . $path)]);
		}

		$exist1 = $this->friendRepository->where([
			'sender_id' => request('reciever_id'),
			'reciever_id' => request('sender_id')])
			->exists();

		$exist2 = $this->friendRepository->where([
			'reciever_id' => request('reciever_id'),
			'sender_id' => request('sender_id'),
		])->exists();

		if (!($exist1 || $exist2)) {

			$this->friendRepository->create(['sender_id' => user()->id, 'reciever_id' => request('reciever_id')]);

		}

		return response($message->content, 200);

	}

	public function getMessage() {

		$data = request()->validate([

			'sender_id' => 'required|numeric|exists:users,id',
			'reciever_id' => 'required|numeric|exists:users,id',

		]);

		$messages1 = collect(

			$this->messageRepository->where('sender_id', $data['sender_id'])
				->where('reciever_id', $data['reciever_id'])
				->orderBy('created_at', 'desc')->get()
		);

		$messages1 = $messages1->sortByDesc('created_at');

		$messages2 = collect(
			$this->messageRepository->where('sender_id', $data['reciever_id'])
				->where('reciever_id', $data['sender_id'])
				->orderBy('created_at', 'desc')->get()
		);

		$messages2 = $messages2->sortByDesc('created_at');

		$messages = $messages1->merge($messages2);

		$messages = $messages->toArray();

		$messages = $this->quick_sort($messages);

		return response($messages, 200);

	}

	public function quick_sort($my_array) {

		$loe = $gt = [];

		if (count($my_array) < 2) {
			return $my_array;
		}
		$pivot_key = key($my_array);
		$pivot = array_shift($my_array);
		foreach ($my_array as $val) {
			if ($val <= $pivot) {
				$loe[] = $val;
			} elseif ($val > $pivot) {
				$gt[] = $val;
			}
		}

		return array_merge($this->quick_sort($loe), array($pivot_key => $pivot), $this->quick_sort($gt));
	}
}
