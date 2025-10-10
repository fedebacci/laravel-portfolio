<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(TechnologiesTableSeeder::class);

        $availableProjects = Project::all()->pluck('id')->toArray();
        $availableTechnologies = Technology::all()->pluck('id')->toArray();
        $projectTechnologiesRelations = [];
        for ($i = 1; $i <= (count($availableProjects) * 2); $i++) {
            $projectTechnologiesRelations[] = [
                'project_id' => ceil($i / 2),
                'technology_id' => $availableTechnologies[array_rand($availableTechnologies)],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('project_technology')->insert($projectTechnologiesRelations);
    }
}
