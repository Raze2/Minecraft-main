<?php

namespace Database\Seeders;

use App\Models\ContentPage;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'About Minecrafter',
                'page_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum, enim nec molestie viverra, lacus nisl accumsan enim, at porta eros odio at dui. Integer quis sem pellentesque, consectetur arcu eget, rutrum dolor. Praesent mauris felis, fringilla sit amet hendrerit vel, finibus at sapien. Suspendisse ut feugiat nunc, at dictum turpis. Nam eget tortor sit amet risus iaculis ultrices ac sed elit. Nunc vestibulum fringilla est non tincidunt. Cras sed mauris nec libero aliquet blandit et ut ligula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi pretium augue tellus, at faucibus urna eleifend sed. Nullam faucibus justo quam, non porta elit eleifend vitae.'
            ],
            [
                'id'    => 2,
                'title' => 'Privacy policy',
                'page_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum, enim nec molestie viverra, lacus nisl accumsan enim, at porta eros odio at dui. Integer quis sem pellentesque, consectetur arcu eget, rutrum dolor. Praesent mauris felis, fringilla sit amet hendrerit vel, finibus at sapien. Suspendisse ut feugiat nunc, at dictum turpis. Nam eget tortor sit amet risus iaculis ultrices ac sed elit. Nunc vestibulum fringilla est non tincidunt. Cras sed mauris nec libero aliquet blandit et ut ligula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi pretium augue tellus, at faucibus urna eleifend sed. Nullam faucibus justo quam, non porta elit eleifend vitae.'
            ],
            [
                'id'    => 3,
                'title' => 'Store Terms',
                'page_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum, enim nec molestie viverra, lacus nisl accumsan enim, at porta eros odio at dui. Integer quis sem pellentesque, consectetur arcu eget, rutrum dolor. Praesent mauris felis, fringilla sit amet hendrerit vel, finibus at sapien. Suspendisse ut feugiat nunc, at dictum turpis. Nam eget tortor sit amet risus iaculis ultrices ac sed elit. Nunc vestibulum fringilla est non tincidunt. Cras sed mauris nec libero aliquet blandit et ut ligula. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Morbi pretium augue tellus, at faucibus urna eleifend sed. Nullam faucibus justo quam, non porta elit eleifend vitae.'
            ],
        ];

        ContentPage::insert($roles);
    }
}
