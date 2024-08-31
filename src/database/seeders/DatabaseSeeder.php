<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserTableSeeder;
use App\Models\User;
use App\Models\Worktime;
use Database\Factories\UserFactory;
use Database\Factories\WorktimeFactory;
use App\Models\Breaktime;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(50)->create();
        Worktime::factory(100)->create();
        Breaktime::factory(100)->create();
    }
}
