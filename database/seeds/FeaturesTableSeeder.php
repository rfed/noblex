<?php

use Illuminate\Database\Seeder;
use Noblex\Feature;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feature::create([
        	'name'         => 'Play & Share',
        	'description'  => 'Description 1'
        ]);

        Feature::create([
        	'name'    => 'HDMI',
        	'description' => 'Description 2'
        ]);

        Feature::create([
        	'name'    => 'Bluetooth',
        	'description' => 'Description 3'
        ]);

        Feature::create([
        	'name'    => 'TDA',
        	'description' => 'Description 4'
        ]);
    }
}
