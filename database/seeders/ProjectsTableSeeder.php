<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //

        for ($i = 0; $i < 10; $i++) {
            $newProject = new Project();

            // - Hard coded, assuming there are 4 types
            // $newProject->type_id = $faker->numberBetween(1, 4);
            // - Dynamic, fetch all type ids and pick one randomly
            $availableTypes = Type::all()->pluck('id')->toArray();
            $newProject->type_id = $faker->randomElement($availableTypes);

            $newProject->title = $faker->sentence();
            $newProject->client = $faker->name();
            $newProject->startDate = $faker->dateTimeBetween('-1 month', '-1 week');
            $newProject->endDate = $faker->dateTimeBetween('-1 week');

            $newProject->summary = $faker->paragraphs(3, true);

            $newProject->save();
        }
    }
}
