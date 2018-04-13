<?php

use Illuminate\Database\Seeder;
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
        factory(Category::class, 1)->create();
    }
}
