<?php

namespace Tests\Unit;

use App\Models\Employee;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPUnit\Framework\TestCase;

class AccessorFullNameTest extends TestCase
{
    use DatabaseTransactions;

    public function test_full_name_is_returned(): void
    {
        $user = new Employee();
        $user->first_name = 'John';
        $user->last_name = 'Doe';

        $this->assertSame('John Doe', $user->full_name);
    }
}
