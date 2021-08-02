<?php
namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\User;
use App\Models\Organisation;

class OpenJusticeOrganisationSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $demo_password = '$2y$10$SEGNhI5HKOWqc.2AoDQMU.HzxsDHwAl8NpaqD0s4WJxZM.2REFqUS';

        $dpo = User::factory()->create([
      'name' => 'Jeoffrey Vigneron',
      'email' => 'jeoffrey@openjustice.be',
      'password' => $demo_password,
    ]);

        $member1 = User::factory()->create([
      'name' => 'Martin Erpicum',
      'email' => 'martin@mesydel.com',
      'password' => $demo_password,
    ]);

        $member2 = User::factory()->create([
      'name' => 'Anne-Sophie vandendooren',
      'email' => 'anne-sophie@openjustice.com',
      'password' => $demo_password,
    ]);


        $legal_representative = User::factory()->create([
      'name' => 'Pieterjan Montens',
      'email' => 'pieterjan@openjustice.be',
      'password' => $demo_password,
    ]);

        $organisation = Organisation::factory()
    ->create([
      'name' => 'OpenJustice ASBL',
      'vat_number' => 'BE 0749.460.404',
      'address' => 'Rue Basse-Wez 43',
      'postcode' => '4020',
      'city' => 'Liège',
      'country' => 'Belgium',
      'logo_url' => 'https://raw.githubusercontent.com/openjusticebe/ui-assets/main/favicons/favicon-bi.png',
      'description' => 'Initiative citoyenne de mise à disposition de données, d’outils et de services numériques'
    ]);

        $organisation->members()->syncWithoutDetaching(
            [
        $member1->id => [
          'member_type' => 'member',
          'is_external' => rand(0, 1),
          'is_admin' => 0
        ],
        $member2->id => [
          'member_type' => 'member',
          'is_external' => 0,
          'is_admin' => 1
        ],
        $dpo->id => [
          'member_type' => 'data_protection_officer',
          'is_external' => rand(0, 1),
          'is_admin' => 1
        ],
        $legal_representative->id => [
          'member_type' => 'legal_representative',
          'is_external' => 0,
          'is_admin' => 1
        ]
      ]
        );
    }
}
