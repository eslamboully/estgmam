<?php

namespace Modules\Trip\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Modules\Trip\Notifications\SendTripNotifications;

class SendTripToFollowers implements ShouldQueue {
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	/**
	 * Create a new job instance.
	 *
	 * @return void
	 */
	protected $user, $followers;

	public function __construct($user, $followers) {
		$this->followers = $followers;
		$this->user = $user;
	}

	/**
	 * Execute the job.
	 *
	 * @return void
	 */
	public function handle() {

		foreach ($this->followers as $follower) {

			$follower->sender->notify(new SendTripNotifications($this->user));

		}

	}
}
