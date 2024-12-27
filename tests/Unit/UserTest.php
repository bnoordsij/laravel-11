<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_user_has_title(): void
    {
        $name = 'Bart';
        $user = new User();
        $user->name = $name;

        $this->assertSame($name, $user->getTitleAttribute());
    }
}
