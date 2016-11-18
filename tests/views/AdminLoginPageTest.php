<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserLoginPageTest extends TestCase
{
    /** @test */
    public function admin_can_see_login_form()
    {
        $this->visit('/')
             ->see('Enter Admin Credentials')
             ->see('username')
             ->see('password')
             ->see('Login');
    }
}
