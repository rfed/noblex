<?php

use Illuminate\Database\Seeder;
use Noblex\Attributegroup;

class AttributeGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Attributegroup::create([
    		'name'	=> 'Pantalla'
    	]);

    	Attributegroup::create([
    		'name'	=> 'Conectividad'
    	]);

    	Attributegroup::create([
    		'name'	=> 'Audio'
    	]);
    }
}
