<?php
namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Organisation;
use App\Models\Process;
use App\Models\Tag;

class OpenJusticeProcessesSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $organisation = Organisation::whereSlug('openjustice-asbl')
    ->first();

        $process = Process::factory()->create(
            [
        'name' => 'Anonymisation des décisions de justice en vue de la constitution d’une base de données libre et accessible à tous',
        'organisation_id' => $organisation->id,
        'description' => 'Outil d’anonymisation OpenJustice'
      ]
        );

        $tags_database = collect([
      // Name, category, type, description
      [
        'name' => 'Ip Address',
        'type' => 'identification',
        'category' => 'data_object',
        'description' => 'Ip address of last connection',
        'specific_description' => ''
      ],
      [
        'name' => 'Personal and professional opinion',
        'type' => 'expertise',
        'category' => 'data_object',
        'description' => 'Opinion of the community based on professional experience',
        'specific_description' => ''
      ],
      [
        'name' => 'Professional information',
        'type' => 'professional',
        'category' => 'data_object',
        'description' => 'Profession, title',
        'specific_description' => ''
      ],
      [
        'name' => 'Irsib Innoviris',
        'type' => 'client',
        'category' => 'data_controller',
        'description' => 'Company',
        'specific_description' => ''
      ],

      [
        'name' => 'Scientist',
        'type' => 'participant',
        'category' => 'data_subject',
        'description' => 'Scientist',
        'specific_description' => ''
      ],
      [
        'name' => 'Researcher',
        'type' => 'participant',
        'category' => 'data_subject',
        'description' => 'Researcher',
        'specific_description' => ''
      ],
      [
        'name' => 'Name',
        'type' => 'identification',
        'category' => 'data_object',
        'description' => 'First name and last name',
        'specific_description' => ''
      ],
      [
        'name' => 'Email Address',
        'type' => 'identification',
        'category' => 'data_object',
        'description' => 'Email addresses provide by the responsible',
        'specific_description' => ''
      ],
      [
        'name' => "Mission de l'ASBL",
        'type' => '',
        'category' => 'purpose',
        'description' => 'Consensus based on scientific construction',
        'specific_description' => 'Open Justice met à disposition des utilisateurs inscrits sur la plateforme Openjustice.be une interface d’anonymisation des décisions de justice qui doit être utilisée avant transmission des décisions (dès lors anonymisées) dans une base de données.  Pour se connecter et disposer d’un identifiant, l’utilisateur doit transmettre son nom, prénom et coordonnées professionnelles.  Il est important de noter qu’il n’y a aucun enregistrement des données lors de l’importation de la décision dans l’interface et que partant, Open Justice ne traite en principe pas les données personnelles contenues dans les décisions de Justice.'
      ],
      [
        'name' => 'NIH',
        'type' => 'research_center',
        'category' => 'data_recipient',
        'description' => '',
        'specific_description' => ''
      ],
      [
        'name' => 'Mesylab',
        'type' => 'company',
        'category' => 'data_processor',
        'description' => '',
        'specific_description' => ''
      ],
      [
        'name' => 'Mesylab',
        'type' => 'company',
        'category' => 'data_operator',
        'description' => '',
        'specific_description' => ''
      ]
    ]);


        foreach ($tags_database as $item) {
            $tag = \App\Models\Tag::firstOrCreate([
        'name' => $item['name'],
        'type' => $item['type'],
        'category' => $item['category'],
        'description' => $item['description'],
        'organisation_id' => $organisation->id,
      ]);

            $process->tags()->attach($tag->id, [
        'specific_description' => $item['specific_description']
      ]);
        }
    }
}
