<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Contracts\Auth\Authenticatable;

use App\User;

class AdminControllerTest extends TestCase
{
    use DatabaseTransactions;

    protected $adminUser;

    public function setUp()
    {
        parent::setUp();

        $this->adminUser = factory(User::class)->create([
            'is_admin' => 1
        ]);
    }
}
