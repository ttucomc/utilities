<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;

class UserModelTest extends TestCase
{
    use DatabaseTransactions;

    protected $adminUser, $normalUser;

    public function setUp()
    {
        parent::setUp();

        $this->adminUser = factory(User::class)->create([
            'is_admin' => 1
        ]);

        $this->normalUser = factory(User::class)->create([
            'is_admin' => 0
        ]);
    }

    /** @test */
    public function it_is_an_administrator()
    {
        $this->assertEquals(1, $this->adminUser->isAdmin());
    }

    /** @test */
    public function it_is_not_an_administrator()
    {
        $this->assertEquals(0, $this->normalUser->isAdmin());
    }
}
