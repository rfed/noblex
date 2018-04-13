<?php

use Illuminate\Database\Seeder;
use Noblex\Brand;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Brand::create([
        	'name'	=> 'Noblex'
        ]);

        Brand::create([
        	'name'	=> 'Atma'
        ]);

        Brand::create([
        	'name'	=> 'Sharp'
        ]);
    }
}
