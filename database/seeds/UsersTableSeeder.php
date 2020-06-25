<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'first_name' => 'Heang',
            'last_name' => 'Theara',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin12345'),
            
            'position' => 'Manager',
        ]);
        DB::table('users')->insert([
            'role_id' => '2',
            'first_name' => 'Choun',
            'last_name' => 'Channack',
            'email' => 'channack@gmail.com',
            'password' => bcrypt('channack12345'),
           
            'position' => 'Trainer',
        ]);
    }
}
