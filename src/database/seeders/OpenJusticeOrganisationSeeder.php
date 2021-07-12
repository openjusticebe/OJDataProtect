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
        $dpo = User::factory()->create([
      'name' => 'Jeoffrey Vigneron',
      'email' => 'jeoffrey@openjustice.be',
      'password' => '$2y$10$SEGNhI5HKOWqc.2AoDQMU.HzxsDHwAl8NpaqD0s4WJxZM.2REFqUS',
    ]);

        $member = User::factory()->create([
      'name' => 'Martin Erpicum',
      'email' => 'martin@mesydel.com',
      'password' => '$2y$10$SEGNhI5HKOWqc.2AoDQMU.HzxsDHwAl8NpaqD0s4WJxZM.2REFqUS',
    ]);

        $organisation = Organisation::factory()
    ->create([
      'name' => 'OpenJustice ASBL',
      'slug' => 'openjustice-asbl',
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
        $member->id => [
          'member_type' => 'member',
          'is_external' => rand(0, 1),
          'is_admin' => 1
        ],
        $dpo->id => [
          'member_type' => 'data_protection_officer',
          'is_external' => rand(0, 1),
          'is_admin' => 1
        ]
      ]
        );
    }
}
