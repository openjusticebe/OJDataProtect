<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Organisation;
use App\Models\User;
use App\Models\Tag;

class RandomContentGenSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run(Faker $faker)
    {
        $organisations = Organisation::get();

        foreach ($organisations as $organisation) {
            $member = User::inRandomOrder()->first();
            $random_users = rand(1, 5);
            for ($i=0; $i < $random_users; $i++) {
                $member = User::inRandomOrder()->first();
                $organisation->members()->syncWithoutDetaching([$member->id => [
                    'member_type' => 'member',
                    'is_external' => rand(0, 1),
                    'is_admin' => rand(0, 1)
                ]]);
            }

            $organisation->members()->syncWithoutDetaching(
                [
                $member->id => [
                'member_type' => 'data_protection_officer',
                'is_external' => rand(0, 1),
                'is_admin' => rand(0, 1)
                ]
               ]
            );

            Tag::factory()->count(rand(12, 24))->create(['organisation_id' => $organisation->id]);

            foreach ($organisation->processes as $process) {
                $random_tags = rand(5, 15);
                for ($i=0; $i < $random_tags; $i++) {
                    $tag_ids = $organisation->tags()->inRandomOrder()->get()->pluck('id')->toArray();
                   
                    $tag_id = $tag_ids[rand(0, count($tag_ids) - 1)];

                    $process->tags()->syncWithoutDetaching([$tag_id], ['specific_description' => $faker->text]);
                }
            }
        }
    }
}
