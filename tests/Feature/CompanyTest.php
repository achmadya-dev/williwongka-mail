<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use WithFaker, DatabaseTransactions;

    public function test_company_index()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('company.index'));

        $response->assertStatus(200);
    }

    public function test_company_create()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('company.create'));

        $response->assertStatus(200);
    }

    public function test_company_store()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('company.store'), [
            'name' => $this->faker->company,
            'email' => $this->faker->unique()->safeEmail,
            'website' => $this->faker->url,
            'logo' => $this->faker->image('public/storage/logos', 100, 100, null, false),
        ]);

        $response->assertStatus(302);
    }

    public function test_company_edit()
    {
        $user = User::factory()->create();

        $company = Company::factory()->create();

        $response = $this->actingAs($user)->get(route('company.edit', $company->id));

        $response->assertStatus(200);
    }

    public function test_company_update()
    {
        $user = User::factory()->create();

        $company = Company::factory()->create();

        $response = $this->actingAs($user)->patch(route('company.update', $company->id), [
            'name' => $this->faker->company,
            'email' => $this->faker->unique()->safeEmail,
            'website' => 'https://' . $this->faker->domainName,
            'logo' => $this->faker->image('public/storage/logos', 100, 100, null, false),
        ]);

        $response->assertStatus(302);
    }

    public function test_company_destroy()
    {
        $user = User::factory()->create();

        $company = Company::factory()->create();

        $response = $this->actingAs($user)->delete(route('company.destroy', $company->id));

        $response->assertStatus(302);
    }
}
