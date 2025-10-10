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
        $availableTypes = Type::all()->pluck('id')->toArray();

        for ($i = 0; $i < 10; $i++) {
            $newProject = new Project();

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
