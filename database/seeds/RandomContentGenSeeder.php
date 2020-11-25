<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class RandomContentGenSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run(Faker $faker)
    {

        $organisations = \App\Models\Organisation::get();

        foreach ($organisations as $organisation) {
            $member = \App\User::inRandomOrder()->first();

            for ($i=0; $i < rand(1,5); $i++) {
                $member = \App\User::inRandomOrder()->first();
                $organisation->members()->syncWithoutDetaching([$member->id => [
                    'member_type' => 'member',
                    'is_external' => rand(0,1),
                    'is_admin' => rand(0,1)
                ]]);
            }

            $organisation->members()->syncWithoutDetaching([$member->id => [
                'member_type' => 'data_protection_officer',
                'is_external' => rand(0,1),
                'is_admin' => rand(0,1)
            ]]);

            factory(App\Models\Tag::class, rand(5,24))
            ->create([
                'organisation_id' => $organisation->id
            ]);

            foreach ($organisation->processes as $process) {
                for ($i=0; $i < rand(1,15); $i++) {

                    $data = $organisation->tags()->inRandomOrder()->first();

                    $process->tags()->attach($data->id, [
                        'specific_description' => $faker->text
                    ]);
                }
            }

        }

    }
}
