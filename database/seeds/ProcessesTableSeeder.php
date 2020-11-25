<?php

use Illuminate\Database\Seeder;

class ProcessesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\Models\Process::class, 100)->create();

    }
}
