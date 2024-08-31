<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name'=>'a',
            'email'=>'p@p',
            'password'=>'1111'
        ];
        DB::table('users')->insert($user);
        //
    }
}
