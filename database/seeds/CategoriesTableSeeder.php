<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Noblex\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
        	'name'	=> 'TV',
        	'url'	=> 'tv'
        ]);

        Category::create([
        	'name'	=> 'Celulares',
        	'url'	=> 'celulares-huawei'
        ]);

        Cache::clear();
    }
}
