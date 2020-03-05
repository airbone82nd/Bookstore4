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
        // $this->call(UsersTableSeeder::class);
        $user =new\App\User();
        $user->name = 'Zeedzad';
        $user->email = 'Zeedzad007@gmail.com';
        $user->password = Hash::make('kajoketare99');
        $user->save();
    }
}
