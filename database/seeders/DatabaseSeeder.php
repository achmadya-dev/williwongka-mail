<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Company::factory(2)->create();

        Employee::factory(50)->create();

        User::factory()->create([
            'name' => 'Folkatech Admin',
            'email' => 'admin@folkatech.com',
        ]);
    }
}
