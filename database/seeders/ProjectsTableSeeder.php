<?php

namespace Database\Seeders;

use App\Models\Project;
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

        for ($i = 0; $i < 5; $i++) {
            $newProject = new Project();

            $newProject->title = $faker->sentence();
            $newProject->client = $faker->name();
            // ! Error: Illuminate\Database\QueryException
            // ! Invalid datetime format: 1292 Incorrect date value: '20-10-1977' for column 'startDate' at row 1
            // $newProject->startDate = $faker->date('d-m-Y', '2025-10-01');
            // $newProject->endDate = $faker->date('d-m-Y');
            // # Devo inserire per forza come dateTime
            // ! Test appending hours:minutes:seconds (not working because dateTime is not a string)
            // $newProject->startDate = $faker->dateTimeBetween('-1 month', '-1 week') . ' 00:00:00';
            // $newProject->endDate = $faker->dateTimeBetween('-1 week') . ' 00:00:00';
            // $newProject->startDate = $faker->dateTimeBetween('-1 month', '-1 week') . $faker->time();
            // $newProject->endDate = $faker->dateTimeBetween('-1 week') . $faker->time();
            // $newProject->startDate = $faker->dateTime('-1 week');
            // $newProject->endDate = $faker->dateTime();

            $newProject->startDate = $faker->dateTimeBetween('-1 month', '-1 week');
            $newProject->endDate = $faker->dateTimeBetween('-1 week');

            $newProject->summary = $faker->paragraphs(3, true);

            $newProject->save();
        }
    }
}
