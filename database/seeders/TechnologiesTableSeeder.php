<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use App\Models\Technology;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //
        $technologies = ['HTML', 'CSS', 'JavaScript', 'React', 'Node.js', 'PHP', 'Laravel'];

        foreach ($technologies as $technology) {
            $newTechnology = new Technology();

            $newTechnology->name = $technology;
            $newTechnology->color = $faker->hexColor();
            
            $newTechnology->save();
        }
    }
}
