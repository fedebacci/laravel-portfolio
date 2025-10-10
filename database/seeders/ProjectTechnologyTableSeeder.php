<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
// FORSE?
use App\Models\ProjectTechnology;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class ProjectTechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //

        $availableProjects = Project::all()->pluck('id')->toArray();
        $availableTechnologies = Technology::all()->pluck('id')->toArray();

        for ($i = 0; $i < 20; $i++) {
            $newProjectTechnology = new ProjectTechnology();

            $newProjectTechnology->project_id = $faker->randomElement($availableProjects);
            $newProjectTechnology->technology_id = $faker->randomElement($availableTechnologies);

            $newProjectTechnology->save();
        }
    }
}
