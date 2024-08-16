<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use WithFaker, DatabaseTransactions;

    public function test_employee_index()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('employee.index'));

        $response->assertStatus(200);
    }

    public function test_employee_create()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('employee.create'));

        $response->assertStatus(200);
    }

    public function test_employee_store()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('employee.store'), [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'company_id' => $this->faker->numberBetween(1, Company::count()),
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
        ]);

        $response->assertStatus(302);
    }

    public function test_employee_edit()
    {
        $user = User::factory()->create();

        $company = Company::factory()->create();

        $employee = Employee::create([
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'company_id' => $company->id,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
        ]);

        $response = $this->actingAs($user)->get(route('employee.edit', $employee->id));

        $response->assertStatus(200);
    }

    public function test_employee_update()
    {
        $user = User::factory()->create();

        $company = Company::factory()->create();

        $employee = Employee::create([
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'company_id' => $company->id,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
        ]);

        $response = $this->actingAs($user)->patch(route('employee.update', $employee->id), [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'company_id' => $this->faker->numberBetween(1, Company::count()),
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
        ]);

        $response->assertStatus(302);
    }

    public function test_employee_destroy()
    {
        $user = User::factory()->create();

        $company = Company::factory()->create();

        $employee = Employee::create([
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'company_id' => $company->id,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
        ]);

        $response = $this->actingAs($user)->delete(route('employee.destroy', $employee->id));

        $response->assertStatus(302);
    }
}
