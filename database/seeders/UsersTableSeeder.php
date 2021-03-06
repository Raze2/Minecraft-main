<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'              => 1,
                'name'            => 'Owner',
                'email'           => 'admin@admin.com',
                'password'        => bcrypt('password'),
                'remember_token'  => null,
                'two_factor_code' => '',
                'username'        => '',
                'uuid'            => '',
            ],
        ];

        User::insert($users);
    }
}
