<?php

use Illuminate\Database\Seeder;

class StuffLeavesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Stuff_leave::class, 10)->create();
    }
}
