<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Contracts\Auth\Authenticatable;

use App\User;

class AdminDashboardTest extends TestCase
{
    // Cannot figure out how to login as an authenticated user
    // using $this->actingAs($adminUser). For now, I will be
    // disabling middleware.
    public function setUp()
    {
        parent::setUp();

        $adminUser = User::first();
        $this->actingAs($adminUser);
    }

    /** @test */
    public function admin_can_see_option_to_modify_his_profile()
    {
        $this->visit('/')
             ->see('Profile');
    }

    /** @test */
    public function admin_can_see_option_to_create_a_new_faculty_member()
    {
        $this->visit('/')
             ->press('Faculty/Staff')
             ->see('Create New Faculty/Staff Member');
    }
}
