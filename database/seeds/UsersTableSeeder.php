<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('users')->insert([
        'email'=>'agbeyeseun1@gmail.com',
        'role_id'=>'1',
        'password'=> bcrypt('mother1234'),
        'status_id' => '1',
        ]);
    }
}
