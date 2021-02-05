<?php

use Illuminate\Database\Seeder;

class SessionListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Session_list::class, 1)->create();
    }
}
