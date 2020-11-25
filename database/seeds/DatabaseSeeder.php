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
      $this->call(OrganisationsTableSeeder::class);
      $this->call(UsersTableSeeder::class);
      $this->call(ProcessesTableSeeder::class);


      $this->call(RandomContentGenSeeder::class);
      $this->call(MesylabOrganisationSeeder::class);

      $this->call(MesylabProcessDengueSeeder::class);
      $this->call(MesylabProcessRDISeeder::class);




    }
}
