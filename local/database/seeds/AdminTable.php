<?php

use Illuminate\Database\Seeder;

class AdminTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('ck_admin')->insert([
          'username' => 'admin',
          'password' => Hash::make('H025394492'),
          'name' => "admin",
          'email' => str_random(10).'@gmail.com',

      ]);
    }
}
