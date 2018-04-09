<?php

use Illuminate\Database\Seeder;
use Noblex\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 1)->create();
    }
}
