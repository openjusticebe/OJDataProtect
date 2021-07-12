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
        User::factory()->make([
            'name' => 'John Doe',
            'email' => 'john.doe@openjustice.be',
            'password' => bcrypt('demo'),
        ]);

        User::factory()->count(10)->create();
    }
}
