<?php

use Carbon\Carbon;
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
        factory(App\User::class)
        ->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@openjustice.be',
            'password' => bcrypt('demo'),
        ]);


        factory(App\User::class, 10)->create();


    }
}
