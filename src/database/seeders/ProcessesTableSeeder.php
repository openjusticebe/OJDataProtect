<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Process;

class ProcessesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Process::factory()->count(30)->create();
    }
}
