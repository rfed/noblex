<?php

use Illuminate\Database\Seeder;
use Noblex\Attribute;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attribute::create([
        	'attributeGroup_id'	=> 1,
    		'name'				=> 'Resolucion'
    	]);

    	Attribute::create([
        	'attributeGroup_id'	=> 1,
    		'name'				=> 'Tasa de refresco'
    	]);

    	Attribute::create([
        	'attributeGroup_id'	=> 2,
    		'name'				=> 'Puertos'
    	]);

    	Attribute::create([
        	'attributeGroup_id'	=> 2,
    		'name'				=> 'Bluetooth'
    	]);

    	Attribute::create([
        	'attributeGroup_id'	=> 3,
    		'name'				=> 'Salida de Audio'
    	]);

    	Attribute::create([
        	'attributeGroup_id'	=> 3,
    		'name'				=> 'Potencia de parlantes'
    	]);
    }
}
