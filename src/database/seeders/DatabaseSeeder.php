<?php
namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call(OrganisationsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
  

        $this->call(ProcessesTableSeeder::class);
        $this->call(RandomContentGenSeeder::class);

        $this->call(OpenJusticeOrganisationSeeder::class);
        $this->call(OpenJusticeProcessesSeeder::class);

        $this->call(MesylabOrganisationSeeder::class);
  
        $this->call(MesylabProcessDengueSeeder::class);
        $this->call(MesylabProcessRDISeeder::class);
    }
}
