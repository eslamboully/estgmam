<?php

namespace Modules\Post\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Post\Entities\Plan;

class PostDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Plan::create([
            'money' => 'تجريبي',
            'en.date' => '3 days',
            'en.currency' => 'riyal',
            'ar.date' => 'ثلاثة ايام',
            'ar.currency' => 'ريال',
        ]);
    }
}
