<?php

use Illuminate\Database\Seeder;
use Modules\Admin\Database\Seeders\AdminDatabaseSeeder;
use Modules\Config\Database\Seeders\ConfigDatabaseSeeder;
use Modules\User\Database\Seeders\UserDatabaseSeeder;
use Modules\Post\Database\Seeders\PostDatabaseSeeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$this->call(AdminDatabaseSeeder::class);
		$this->call(UserDatabaseSeeder::class);
		$this->call(ConfigDatabaseSeeder::class);
		$this->call(PostDatabaseSeeder::class);

	}
}
