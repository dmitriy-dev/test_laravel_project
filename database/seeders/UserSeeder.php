<?php

namespace Database\Seeders;

use Core\User\User;
use Core\User\UserStatus;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'Admin',
            'email' => 'mail@mail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
            'status' => UserStatus::STATUS_ACTIVE,
        ]);
    }
}
