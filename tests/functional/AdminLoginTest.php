<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminLoginTest extends TestCase
{
    use DatabaseTransactions;

    protected $adminUser;

    /** @test */
    public function admin_can_see_login_form()
    {
        $this->visit('/')
             ->see('Enter Credentials')
             ->see('Email')
             ->see('Password')
             ->see('Login');
    }

    /** @test */
    public function admin_can_see_dashboard_when_logged_in()
    {
        $this->adminUser = factory(App\User::class)->create();

        $email = $this->adminUser->email;
        $password = 'secret';

        $this->visit('/')
             ->see('Enter Credentials')
             ->see('Email')
             ->see('Password')
             ->see('Login')
             ->type($email, 'email')
             ->type($password, 'password')
             ->press('Login')
             ->seePageIs('/');
    }

    /** @test */
    public function admin_cannot_login_with_the_wrong_credentials()
    {
        $this->visit('/')
             ->see('Enter Credentials')
             ->see('Email')
             ->see('Password')
             ->see('Login')
             ->type('wrong-email@ttu.edu', 'email')
             ->type('wrong-password', 'password')
             ->press('Login')
             ->see('Incorrect Credentials');
    }
}
