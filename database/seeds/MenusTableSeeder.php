<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            'menu_title' => 'Dashboard',
            'menu_slug' => 'dashboard',
            'menu_icon' => 'fa fa-dashboard',
            'menu_entry' => 'admin.dashboard',
            'menu_priority' => 0,
            'menu_parent' => 0,
        ]);
        DB::table('menus')->insert([
            'menu_title' => 'Illusion',
            'menu_slug' => 'illusion',
            'menu_icon' => 'fa fa-file-text',
            'menu_entry' => 'admin.illusion',
            'menu_priority' => 0,
            'menu_parent' => 0,
        ]);
        DB::table('menus')->insert([
            'menu_title' => 'All Illusions',
            'menu_slug' => 'illusion',
            'menu_icon' => 'fa fa-file-text',
            'menu_entry' => 'admin.illusion.index',
            'menu_priority' => 0,
            'menu_parent' => 2,
        ]);
        DB::table('menus')->insert([
            'menu_title' => 'Create Illusion',
            'menu_slug' => 'illusion',
            'menu_icon' => 'fa fa-file-text',
            'menu_entry' => 'admin.illusion.create',
            'menu_priority' => 0,
            'menu_parent' => 2,
        ]);
        DB::table('menus')->insert([
            'menu_title' => 'Media',
            'menu_slug' => 'media',
            'menu_icon' => 'fa fa-folder-open',
            'menu_entry' => 'admin.media',
            'menu_priority' => 0,
            'menu_parent' => 0,
        ]);
        DB::table('menus')->insert([
            'menu_title' => 'Page',
            'menu_slug' => 'page',
            'menu_icon' => 'fa fa-file-text',
            'menu_entry' => 'admin.page',
            'menu_priority' => 0,
            'menu_parent' => 0,
        ]);

    }
}
