<?php

use App\User;
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
        User::insert(
            [
                ['name' => 'User1', 'email' => 'qwe@ukr.net', 'password' => bcrypt('111111')],
                ['name' => 'User2', 'email' => 'd@ukr.net', 'password' => bcrypt('111111')],
            ]
        );
    }
}
