<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Technology;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            ['name' => 'HTML', 'color' => '#E34C26'],
            ['name' => 'CSS', 'color' => '#264DE4'],
            ['name' => 'JavaScript', 'color' => '#F0DB4F'],
            ['name' => 'React', 'color' => '#61DBFB'],
            ['name' => 'Node.js', 'color' => '#68A063'],
            ['name' => 'PHP', 'color' => '#777BB4'],
            ['name' => 'Laravel', 'color' => '#FF2D20'],
        ];


        foreach ($technologies as $technology) {
            $newTechnology = new Technology();

            $newTechnology->name = $technology['name'];
            $newTechnology->color = $technology['color'];
            
            $newTechnology->save();
        }
    }
}
