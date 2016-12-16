<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;

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

    /** @test */
    public function it_can_store_a_new_administrator_in_the_database()
    {
        $this->actingAs($this->adminUser)
             ->json('POST', '/api/admin/store', [
                 'first_name'  => 'Testy',
                 'last_name'   => 'Tester',
                 'email'       => 'test@email.com',
                 'password'    => 'password'
             ])
             ->seeInDatabase('users', [
                 'first_name'  => 'Testy',
                 'last_name'   => 'Tester',
                 'email'       => 'test@email.com',
                 'password'    => 'password',
                 'is_admin'    => 1
             ])
             ->seeJson([
                 'success'     => true
             ]);
    }

    /** @test */
    public function it_requires_a_first_name_to_store_a_new_administrator()
    {
        $this->actingAs($this->adminUser)
             ->json('POST', '/api/admin/store', [
                 'first_name'  => '',
                 'last_name'   => 'Tester',
                 'email'       => 'test@email.com',
                 'password'    => 'password'
             ])
             ->assertResponseStatus(422)
             ->seeJson([
                 'first_name'  => [
                        'The first name field is required.'
                     ]
             ]);
    }

    /** @test */
    public function it_requires_a_last_name_to_store_a_new_administrator()
    {
        $this->actingAs($this->adminUser)
             ->json('POST', '/api/admin/store', [
                 'first_name'  => 'Testy',
                 'last_name'   => '',
                 'email'       => 'test@email.com',
                 'password'    => 'password'
             ])
             ->assertResponseStatus(422)
             ->seeJson([
                 'last_name'  => [
                        'The last name field is required.'
                     ]
             ]);
    }

    /** @test */
    public function it_requires_an_email_to_store_a_new_administrator()
    {
        $this->actingAs($this->adminUser)
             ->json('POST', '/api/admin/store', [
                 'first_name'  => 'Testy',
                 'last_name'   => 'Tester',
                 'email'       => '',
                 'password'    => 'password'
             ])
             ->assertResponseStatus(422)
             ->seeJson([
                 'email'  => [
                        'The email field is required.'
                     ]
             ]);
    }

    /** @test */
    public function it_requires_a_password_to_store_a_new_administrator()
    {
        $this->actingAs($this->adminUser)
             ->json('POST', '/api/admin/store', [
                 'first_name'  => 'Testy',
                 'last_name'   => 'Tester',
                 'email'       => 'test@email.com',
                 'password'    => ''
             ])
             ->assertResponseStatus(422)
             ->seeJson([
                 'password'  => [
                        'The password field is required.'
                     ]
             ]);
    }

    // /** @test */
    // public function it_requires_admin_credentials_to_store_a_new_administrator()
    // {
    //     $this->actingAs($this->normalUser)
    //          ->json('POST', '/api/admin/store', [
    //              'first_name'  => 'Testy',
    //              'last_name'   => 'Tester',
    //              'email'       => 'test@email.com',
    //              'password'    => 'password'
    //          ])
    //          ->assertResponseStatus(403);
    // }
}
