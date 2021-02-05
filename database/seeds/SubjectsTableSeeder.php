<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('subjects')->delete();
        
        \DB::table('subjects')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'CSE 1221',
                'created_at' => '2021-01-12 14:52:58',
                'updated_at' => '2021-01-12 14:52:58',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'EEE 222',
                'created_at' => '2021-01-12 14:53:05',
                'updated_at' => '2021-01-12 14:53:05',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'EEE 101',
                'created_at' => '2021-01-12 14:53:17',
                'updated_at' => '2021-01-12 14:53:17',
            ),
        ));
        
        
    }
}