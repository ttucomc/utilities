<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;
use App\Team;

/*
 * Storing new admins and team members in the database assumes that the
 * requests come into the contoller from the client side through AJAX.
 * There is no client side testing of the form data, but there may
 * be in the future.
 */

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
    public function it_requires_a_unique_email_to_store_a_new_administrator()
    {
        factory(User::class)->create([
            'email' => 'test@email.com'
        ]);

        $this->actingAs($this->adminUser)
             ->json('POST', '/api/admin/store', [
                 'first_name'  => 'Testy',
                 'last_name'   => 'Tester',
                 'email'       => 'test@email.com',
                 'password'    => 'password'
             ])
             ->assertResponseStatus(422)
             ->seeJson([
                 'email'  => [
                        'The email has already been taken.'
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

    /** @test */
    public function it_requires_the_password_to_be_at_least_6_characters_to_store_a_new_administrator()
    {
        $this->actingAs($this->adminUser)
             ->json('POST', '/api/admin/store', [
                 'first_name'  => 'Testy',
                 'last_name'   => 'Tester',
                 'email'       => 'test@email.com',
                 'password'    => 'pass'
             ])
             ->assertResponseStatus(422)
             ->seeJson([
                 'password'  => [
                     'The password must be at least 6 characters.'
                 ]
             ]);
    }

    /** @test */
    public function it_can_store_a_new_staff_member_in_the_database()
    {
        $this->actingAs($this->adminUser)
             ->json('POST', '/api/team/store/staff', [
                 'first_name'       => 'Jane',
                 'last_name'        => 'Staffer',
                 'email'            => 'janestaff@email.com',
                 'photo'            => '/path/to/photo.jpg',
                 'title'            => 'Staff CEO',
                 'department'       => 'IT',
                 'room_number'      => '250A',
                 'social_handles'   => null,
                 'bio'              => 'The Jane Staffer bio...',
                 'duties'           => 'My duties include...',
                 'training'         => 'My training includes...',
             ])
             ->seeInDatabase('teams', [
                 'first_name'       => 'Jane',
                 'last_name'        => 'Staffer',
                 'email'            => 'janestaff@email.com',
                 'photo'            => '/path/to/photo.jpg',
                 'role'             => 'staff',
                 'title'            => 'Staff CEO',
                 'department'       => 'IT',
                 'room_number'      => '250A',
                 'social_handles'   => null,
                 'bio'              => 'The Jane Staffer bio...',
                 'duties'           => 'My duties include...',
                 'training'         => 'My training includes...',
             ])
             ->seeJson([
                 'success'     => true
             ]);
    }

    /** @test */
    public function it_requires_a_first_name_to_store_a_new_staff_member()
    {
        $this->actingAs($this->adminUser)
             ->json('POST', '/api/team/store/staff', [
                 'first_name'       => '',
                 'last_name'        => 'Staffer',
                 'email'            => 'janestaff@email.com',
                 'photo'            => '/path/to/photo.jpg',
                 'title'            => 'Staff CEO',
                 'department'       => 'IT',
                 'room_number'      => '250A',
                 'social_handles'   => null,
                 'bio'              => 'The Jane Staffer bio...',
                 'duties'           => 'My duties include...',
                 'training'         => 'My training includes...',
             ])
             ->assertResponseStatus(422)
             ->seeJson([
                 'first_name'  => [
                        'The first name field is required.'
                     ]
             ]);
    }

    /** @test */
    public function it_requires_a_last_name_to_store_a_new_staff_member()
    {
        $this->actingAs($this->adminUser)
             ->json('POST', '/api/team/store/staff', [
                 'first_name'       => 'Jane',
                 'last_name'        => '',
                 'email'            => 'janestaff@email.com',
                 'photo'            => '/path/to/photo.jpg',
                 'title'            => 'Staff CEO',
                 'department'       => 'IT',
                 'room_number'      => '250A',
                 'social_handles'   => null,
                 'bio'              => 'The Jane Staffer bio...',
                 'duties'           => 'My duties include...',
                 'training'         => 'My training includes...',
             ])
             ->assertResponseStatus(422)
             ->seeJson([
                 'last_name'  => [
                        'The last name field is required.'
                     ]
             ]);
    }

    /** @test */
    public function it_requires_an_email_to_store_a_new_staff_member()
    {
        $this->actingAs($this->adminUser)
             ->json('POST', '/api/team/store/staff', [
                 'first_name'       => 'Jane',
                 'last_name'        => 'Staffer',
                 'email'            => '',
                 'photo'            => '/path/to/photo.jpg',
                 'title'            => 'Staff CEO',
                 'department'       => 'IT',
                 'room_number'      => '250A',
                 'social_handles'   => null,
                 'bio'              => 'The Jane Staffer bio...',
                 'duties'           => 'My duties include...',
                 'training'         => 'My training includes...',
             ])
             ->assertResponseStatus(422)
             ->seeJson([
                 'email'  => [
                        'The email field is required.'
                     ]
             ]);
    }

    /** @test */
    public function it_requires_a_unique_email_to_store_a_new_staff_member()
    {
        // Create staff member in the database with the email 'janestaff@email.com'
        factory(Team::class)->create([
            'email' => 'janestaff@email.com'
        ]);

        $this->actingAs($this->adminUser)
             ->json('POST', '/api/team/store/staff', [
                 'first_name'       => 'Jane',
                 'last_name'        => 'Staffer',
                 'email'            => 'janestaff@email.com',
                 'photo'            => '/path/to/photo.jpg',
                 'title'            => 'Staff CEO',
                 'department'       => 'IT',
                 'room_number'      => '250A',
                 'social_handles'   => null,
                 'bio'              => 'The Jane Staffer bio...',
                 'duties'           => 'My duties include...',
                 'training'         => 'My training includes...',
             ])
             ->assertResponseStatus(422)
             ->seeJson([
                 'email'  => [
                        'The email has already been taken.'
                     ]
             ]);
    }

    /** @test */
    public function it_requires_a_title_to_store_a_new_staff_member()
    {
        $this->actingAs($this->adminUser)
             ->json('POST', '/api/team/store/staff', [
                 'first_name'       => 'Jane',
                 'last_name'        => 'Staffer',
                 'email'            => 'janestaff@email.com',
                 'photo'            => '/path/to/photo.jpg',
                 'title'            => '',
                 'department'       => 'IT',
                 'room_number'      => '250A',
                 'social_handles'   => null,
                 'bio'              => 'The Jane Staffer bio...',
                 'duties'           => 'My duties include...',
                 'training'         => 'My training includes...',
             ])
             ->assertResponseStatus(422)
             ->seeJson([
                 'title'  => [
                        'The title field is required.'
                     ]
             ]);
    }

    /** @test */
    public function it_requires_the_department_to_store_a_new_staff_member()
    {
        $this->actingAs($this->adminUser)
             ->json('POST', '/api/team/store/staff', [
                 'first_name'       => 'Jane',
                 'last_name'        => 'Staffer',
                 'email'            => 'janestaff@email.com',
                 'photo'            => '/path/to/photo.jpg',
                 'title'            => 'Staff CEO',
                 'department'       => '',
                 'room_number'      => '250A',
                 'social_handles'   => null,
                 'bio'              => 'The Jane Staffer bio...',
                 'duties'           => 'My duties include...',
                 'training'         => 'My training includes...',
             ])
             ->assertResponseStatus(422)
             ->seeJson([
                 'department'  => [
                        'The department field is required.'
                     ]
             ]);
    }

    /** @test */
    public function it_requires_a_room_number_to_store_a_new_staff_member()
    {
        $this->actingAs($this->adminUser)
             ->json('POST', '/api/team/store/staff', [
                 'first_name'       => 'Jane',
                 'last_name'        => 'Staffer',
                 'email'            => 'janestaff@email.com',
                 'photo'            => '/path/to/photo.jpg',
                 'title'            => 'Staff CEO',
                 'department'       => 'IT',
                 'room_number'      => '',
                 'social_handles'   => null,
                 'bio'              => 'The Jane Staffer bio...',
                 'duties'           => 'My duties include...',
                 'training'         => 'My training includes...',
             ])
             ->assertResponseStatus(422)
             ->seeJson([
                 'room_number'  => [
                        'The room number field is required.'
                     ]
             ]);
    }

    /** @test */
    public function it_can_store_a_new_faculty_member_in_the_database()
    {
        $this->actingAs($this->adminUser)
             ->json('POST', '/api/team/store/faculty', [
                 'first_name'       => 'Jane',
                 'last_name'        => 'Faculty',
                 'email'            => 'jane@email.com',
                 'photo'            => '/path/to/photo.jpg',
                 'title'            => 'Faculty CEO',
                 'department'       => 'Web Design',
                 'room_number'      => '255C',
                 'social_handles'   => 'facebook.com/jane twitter.com/jane',
                 'courses'          => 'course1 course2 course3',
                 'bio'              => 'The Jane Faculty bio...',
                 'research'         => 'My research includes...',
                 'duties'           => 'My duties include...',
                 'training'         => 'My training includes...',
                 'cv'               => '/path/to/cv.pdf'
             ])
             ->seeInDatabase('teams', [
                 'first_name'       => 'Jane',
                 'last_name'        => 'Faculty',
                 'email'            => 'jane@email.com',
                 'photo'            => '/path/to/photo.jpg',
                 'role'             => 'faculty',
                 'title'            => 'Faculty CEO',
                 'department'       => 'Web Design',
                 'room_number'      => '255C',
                 'social_handles'   => 'facebook.com/jane twitter.com/jane',
                 'courses'          => 'course1 course2 course3',
                 'bio'              => 'The Jane Faculty bio...',
                 'research'         => 'My research includes...',
                 'duties'           => 'My duties include...',
                 'training'         => 'My training includes...',
                 'cv'               => '/path/to/cv.pdf'
             ])
             ->seeJson([
                 'success'     => true
             ]);
    }

    /** @test */
    public function it_requires_a_first_name_to_store_a_new_faculty_member()
    {
        $this->actingAs($this->adminUser)
             ->json('POST', '/api/team/store/faculty', [
                 'first_name'       => '',
                 'last_name'        => 'Faculty',
                 'email'            => 'jane@email.com',
                 'photo'            => '/path/to/photo.jpg',
                 'title'            => 'Faculty CEO',
                 'department'       => 'Web Design',
                 'room_number'      => '255C',
                 'social_handles'   => 'facebook.com/jane twitter.com/jane',
                 'courses'          => 'course1 course2 course3',
                 'bio'              => 'The Jane Faculty bio...',
                 'research'         => 'My research includes...',
                 'duties'           => 'My duties include...',
                 'training'         => 'My training includes...',
                 'cv'               => '/path/to/cv.pdf'
             ])
        ->assertResponseStatus(422)
        ->seeJson([
            'first_name'  => [
                   'The first name field is required.'
                ]
        ]);
    }

    /** @test */
    public function it_requires_a_last_name_to_store_a_new_faculty_member()
    {
        $this->actingAs($this->adminUser)
             ->json('POST', '/api/team/store/faculty', [
                 'first_name'       => 'Jane',
                 'last_name'        => '',
                 'email'            => 'jane@email.com',
                 'photo'            => '/path/to/photo.jpg',
                 'title'            => 'Faculty CEO',
                 'department'       => 'Web Design',
                 'room_number'      => '255C',
                 'social_handles'   => 'facebook.com/jane twitter.com/jane',
                 'courses'          => 'course1 course2 course3',
                 'bio'              => 'The Jane Faculty bio...',
                 'research'         => 'My research includes...',
                 'duties'           => 'My duties include...',
                 'training'         => 'My training includes...',
                 'cv'               => '/path/to/cv.pdf'
             ])
        ->assertResponseStatus(422)
        ->seeJson([
            'last_name'  => [
                   'The last name field is required.'
                ]
        ]);
    }

    /** @test */
    public function it_requires_an_email_to_store_a_new_faculty_member()
    {
        $this->actingAs($this->adminUser)
             ->json('POST', '/api/team/store/faculty', [
                 'first_name'       => 'Jane',
                 'last_name'        => 'Faculty',
                 'email'            => '',
                 'photo'            => '/path/to/photo.jpg',
                 'title'            => 'Faculty CEO',
                 'department'       => 'Web Design',
                 'room_number'      => '255C',
                 'social_handles'   => 'facebook.com/jane twitter.com/jane',
                 'courses'          => 'course1 course2 course3',
                 'bio'              => 'The Jane Faculty bio...',
                 'research'         => 'My research includes...',
                 'duties'           => 'My duties include...',
                 'training'         => 'My training includes...',
                 'cv'               => '/path/to/cv.pdf'
             ])
        ->assertResponseStatus(422)
        ->seeJson([
            'email'  => [
                   'The email field is required.'
                ]
        ]);
    }

    /** @test */
    public function it_requires_a_title_to_store_a_new_faculty_member()
    {
        $this->actingAs($this->adminUser)
             ->json('POST', '/api/team/store/faculty', [
                 'first_name'       => 'Jane',
                 'last_name'        => 'Faculty',
                 'email'            => 'jane@email.com',
                 'photo'            => '/path/to/photo.jpg',
                 'title'            => '',
                 'department'       => 'Web Design',
                 'room_number'      => '255C',
                 'social_handles'   => 'facebook.com/jane twitter.com/jane',
                 'courses'          => 'course1 course2 course3',
                 'bio'              => 'The Jane Faculty bio...',
                 'research'         => 'My research includes...',
                 'duties'           => 'My duties include...',
                 'training'         => 'My training includes...',
                 'cv'               => '/path/to/cv.pdf'
             ])
        ->assertResponseStatus(422)
        ->seeJson([
            'title'  => [
                   'The title field is required.'
                ]
        ]);
    }

    /** @test */
    public function it_requires_a_department_to_store_a_new_faculty_member()
    {
        $this->actingAs($this->adminUser)
             ->json('POST', '/api/team/store/faculty', [
                 'first_name'       => 'Jane',
                 'last_name'        => 'Faculty',
                 'email'            => 'jane@email.com',
                 'photo'            => '/path/to/photo.jpg',
                 'title'            => 'Faculty CEO',
                 'department'       => '',
                 'room_number'      => '255C',
                 'social_handles'   => 'facebook.com/jane twitter.com/jane',
                 'courses'          => 'course1 course2 course3',
                 'bio'              => 'The Jane Faculty bio...',
                 'research'         => 'My research includes...',
                 'duties'           => 'My duties include...',
                 'training'         => 'My training includes...',
                 'cv'               => '/path/to/cv.pdf'
             ])
        ->assertResponseStatus(422)
        ->seeJson([
            'department'  => [
                   'The department field is required.'
                ]
        ]);
    }

    /** @test */
    public function it_requires_a_room_number_to_store_a_new_faculty_member()
    {
        $this->actingAs($this->adminUser)
             ->json('POST', '/api/team/store/faculty', [
                 'first_name'       => 'Jane',
                 'last_name'        => 'Faculty',
                 'email'            => 'jane@email.com',
                 'photo'            => '/path/to/photo.jpg',
                 'title'            => 'Faculty CEO',
                 'department'       => 'Web Design',
                 'room_number'      => '',
                 'social_handles'   => 'facebook.com/jane twitter.com/jane',
                 'courses'          => 'course1 course2 course3',
                 'bio'              => 'The Jane Faculty bio...',
                 'research'         => 'My research includes...',
                 'duties'           => 'My duties include...',
                 'training'         => 'My training includes...',
                 'cv'               => '/path/to/cv.pdf'
             ])
        ->assertResponseStatus(422)
        ->seeJson([
            'room_number'  => [
                   'The room number field is required.'
                ]
        ]);
    }
}
