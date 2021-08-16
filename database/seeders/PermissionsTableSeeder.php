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
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 23,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 24,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 25,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 26,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 27,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 28,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 29,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 30,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 31,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 32,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 33,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 34,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 35,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 36,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 37,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 38,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 39,
                'title' => 'post_create',
            ],
            [
                'id'    => 40,
                'title' => 'post_edit',
            ],
            [
                'id'    => 41,
                'title' => 'post_show',
            ],
            [
                'id'    => 42,
                'title' => 'post_delete',
            ],
            [
                'id'    => 43,
                'title' => 'post_access',
            ],
            [
                'id'    => 44,
                'title' => 'game_create',
            ],
            [
                'id'    => 45,
                'title' => 'game_edit',
            ],
            [
                'id'    => 46,
                'title' => 'game_show',
            ],
            [
                'id'    => 47,
                'title' => 'game_delete',
            ],
            [
                'id'    => 48,
                'title' => 'game_access',
            ],
            [
                'id'    => 49,
                'title' => 'all_ticket_access'
            ],
            [
                'id'    => 50,
                'title' => 'ticket_create',
            ],
            [
                'id'    => 51,
                'title' => 'ticket_edit',
            ],
            [
                'id'    => 52,
                'title' => 'ticket_show',
            ],
            [
                'id'    => 53,
                'title' => 'ticket_delete',
            ],
            [
                'id'    => 54,
                'title' => 'ticket_access',
            ],
            [
                'id'    => 55,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
