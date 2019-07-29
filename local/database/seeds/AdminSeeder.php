<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            'username' => 'admin',
            'name' => str_random(10),
            'email' => str_random(10) . '@gmail.com',
            'password' => bcrypt('1234'),
        ]);
    }
}
