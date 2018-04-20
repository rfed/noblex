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
        Category::create([
            'name'  => 'Raiz',
            'root_id' => 0
        ]);
        
    }
}
