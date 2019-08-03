<?php

namespace Modules\User\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;
use Modules\User\Mail\UserResetPasswordMail;

class UserResetPassword implements ShouldQueue {
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	/**
	 * Create a new job instance.
	 *
	 * @return void
	 */

	private $user, $token;

	public function __construct($token, $user) {
		$this->user = $user;
		$this->token = $token;
	}

	/**
	 * Execute the job.
	 *
	 * @return void
	 */
	public function handle() {

		Mail::to($this->user->email)->send(new UserResetPasswordMail(['token' => $this->token, 'user' => $this->user]));
	}
}
