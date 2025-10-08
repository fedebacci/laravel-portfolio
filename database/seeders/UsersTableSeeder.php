<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
            $defaultUser = new User();

            $defaultUser->name = 'Admin';
            $defaultUser->email = 'federicobacci1999@gmail.com';
            $defaultUser->password = bcrypt('passwordTestAdminUser');

            $defaultUser->save();
    }
}
