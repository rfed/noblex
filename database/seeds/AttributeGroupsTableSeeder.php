<?php

use Illuminate\Database\Seeder;
use Noblex\Group;

class AttributeGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Group::create([
    		'name'	=> 'Pantalla'
    	]);

    	Group::create([
    		'name'	=> 'Conectividad'
    	]);

    	Group::create([
    		'name'	=> 'Audio'
    	]);
    }
}
