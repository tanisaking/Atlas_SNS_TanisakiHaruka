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
            'id' => '1',
            'username' => 'UserName',
            'mail' => 'User@mailaddress.com',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'id' => '2',
            'username' => 'test01',
            'mail' => 'test01@mailaddress.com',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'id' => '3',
            'username' => 'test02',
            'mail' => 'test02@mailaddress.com',
            'password' => bcrypt('password'),
        ]);
    }
}
