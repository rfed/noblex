<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class EmailsSubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('email_subjects')->insert([
        	'subject_id'	=>	1,
        	'email'			=>	'fede@lavacoders.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('email_subjects')->insert([
        	'subject_id'	=>	2,
        	'email'			=>	'fede@lavacoders.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('email_subjects')->insert([
        	'subject_id'	=>	3,
        	'email'			=>	'fede@lavacoders.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('email_subjects')->insert([
        	'subject_id'	=>	1,
        	'email'			=>	'federaste14@gmail.com',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
