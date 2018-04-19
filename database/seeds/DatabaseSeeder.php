<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        	UsersTableSeeder::class,
        	/*CategoriesTableSeeder::class,*/
        	BrandsTableSeeder::class,
            AttributeGroupsTableSeeder::class,
            AttributesTableSeeder::class,
            /*AttributeCategoriesTableSeeder::class,*/
            FeaturesTableSeeder::class
        ]);
    }
}
