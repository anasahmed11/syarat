<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'manager',
            'last_name' => 'test',
            'type'=>'1',
            'email' => 'manager@gmail.com',
            'phone' => '01234567891',
            'password' => Hash::make('Mm@12345678'),
        ],[
            'first_name' => 'manager 2',
            'last_name' => 'test',
            'type'=>'1',
            'email' => 'manager2@gmail.com',
            'phone' => '01234567890',
            'password' => Hash::make('Mm@12345678'),
        ]);
    }
}
