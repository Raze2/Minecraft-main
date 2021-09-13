<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Owners',
            ],
            [
                'id'    => 2,
                'title' => 'Admins&Srmods',
            ],
            [
                'id'    => 3,
                'title' => 'Mods',
            ],
            [
                'id'    => 4,
                'title' => 'Helpers',
            ],
            [
                'id'    => 5,
                'title' => 'players',
            ],
        ];

        Role::insert($roles);
    }
}
