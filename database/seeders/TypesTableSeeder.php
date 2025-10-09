<?php

namespace Database\Seeders;

use App\Models\Type;
use Faker\Generator as Faker;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //
        $types = ['Front-end', 'Back-end', 'Full-stack', 'Collaboration'];

        foreach ($types as $type) {
            $newType = new Type();

            $newType->name = $type;
            // $newType->description = "This is a description for the type: $type.";
            $newType->description = $faker->sentence();

            $newType->save();
        }
    }
}
