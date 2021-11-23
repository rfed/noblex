<?php

use Illuminate\Database\Seeder;
use Noblex\Subject;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::create([
        	'title' 	=> 'Asunto 1',
        ]);

        Subject::create([
        	'title' 	=> 'Asunto 2',
        ]);

       	Subject::create([
        	'title' 	=> 'Asunto 3',
        ]); 
    }
}
