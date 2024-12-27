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
        $title = 'Eng.';
        $user = new User();
        $user->title = $title;

        $this->assertSame($title, $user->getTitleAttribute());
    }
}
