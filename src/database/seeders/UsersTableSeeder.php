<?php
namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john.doe@openjustice.be',
            'password' => '$2y$10$SEGNhI5HKOWqc.2AoDQMU.HzxsDHwAl8NpaqD0s4WJxZM.2REFqUS',
          ]);

          
        User::factory()->count(30)->create();
    }
}
