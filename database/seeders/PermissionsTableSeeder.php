<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 19,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 20,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 21,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 22,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 23,
                'title' => 'post_create',
            ],
            [
                'id'    => 24,
                'title' => 'post_edit',
            ],
            [
                'id'    => 25,
                'title' => 'post_show',
            ],
            [
                'id'    => 26,
                'title' => 'post_delete',
            ],
            [
                'id'    => 27,
                'title' => 'post_access',
            ],
            [
                'id'    => 28,
                'title' => 'game_create',
            ],
            [
                'id'    => 29,
                'title' => 'game_edit',
            ],
            [
                'id'    => 30,
                'title' => 'game_show',
            ],
            [
                'id'    => 31,
                'title' => 'game_delete',
            ],
            [
                'id'    => 32,
                'title' => 'game_access',
            ],
            [
                'id'    => 33,
                'title' => 'all_ticket_access'
            ],
            [
                'id'    => 34,
                'title' => 'ticket_create',
            ],
            [
                'id'    => 35,
                'title' => 'ticket_edit',
            ],
            [
                'id'    => 36,
                'title' => 'ticket_show',
            ],
            [
                'id'    => 37,
                'title' => 'ticket_delete',
            ],
            [
                'id'    => 38,
                'title' => 'ticket_access',
            ],
            [
                'id'    => 39,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 40,
                'title' => 'product_management_access',
            ],
            [
                'id'    => 41,
                'title' => 'product_create',
            ],
            [
                'id'    => 42,
                'title' => 'product_edit',
            ],
            [
                'id'    => 43,
                'title' => 'product_show',
            ],
            [
                'id'    => 44,
                'title' => 'product_delete',
            ],
            [
                'id'    => 45,
                'title' => 'product_access',
            ],
            [
                'id'    => 46,
                'title' => 'coupon_create',
            ],
            [
                'id'    => 47,
                'title' => 'coupon_edit',
            ],
            [
                'id'    => 48,
                'title' => 'coupon_show',
            ],
            [
                'id'    => 49,
                'title' => 'coupon_delete',
            ],
            [
                'id'    => 50,
                'title' => 'coupon_access',
            ],
            [
                'id'    => 51,
                'title' => 'order_create',
            ],
            [
                'id'    => 52,
                'title' => 'order_show',
            ],
            [
                'id'    => 53,
                'title' => 'order_access',
            ],
            [
                'id'    => 54,
                'title' => 'no_permession',
            ], 
        ];

        Permission::insert($permissions);
    }
}
