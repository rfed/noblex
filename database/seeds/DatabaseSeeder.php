<?php

use Illuminate\Database\Seeder;
use Noblex\Http\Controllers\Admin\AttributeController;

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
            FeaturesTableSeeder::class,
        	CategoriesTableSeeder::class,
            BrandsTableSeeder::class,
            AttributeGroupsTableSeeder::class,
            AttributesTableSeeder::class,
            AttributeCategoriesTableSeeder::class,
        	SubjectsTableSeeder::class,
            EmailsSubjectsTableSeeder::class,
        ]);
    }
}
