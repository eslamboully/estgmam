<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\User\Repositories\UserRepository;

class UserDatabaseSeeder extends Seeder {
	public function __construct(UserRepository $userRepository) {
		$this->userRepository = $userRepository;
	}
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Model::unguard();

		$this->userRepository->create([

			'full_name' => 'user',
			'email' => 'user@user.com',
			'password' => bcrypt('user'),
			'phone' => '123456789',
			'country' => 'مصر',
			'state' => 'القاهرة',
		]);

		$this->userRepository->create([

			'full_name' => 'provider',
			'email' => 'provider@provider.com',
			'password' => bcrypt('provider'),
			'phone' => '123456789',
			'country' => 'مصر',
			'state' => 'القاهرة',
		]);
	}
}
