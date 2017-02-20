<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Team;

class TeamControllerTest extends TestCase
{
    use DatabaseTransactions;

    protected $facultyTeamMember;
    protected $staffTeamMember;

    public function setUp()
    {
        parent::setUp();

        // Create test faculty team member and persist to DB: run before every test
        $this->facultyTeamMember = factory(Team::class)->create([
            'eraiderID'      => 'ttesterfaculty',
            'role'           => 'faculty',
            'first_name'     => 'Faculty',
            'last_name'      => 'Tester',
            'email'          => 'testyfaculty@mail.com',
            'phone_number'   => '123-456-7890',
            'title'          => 'New Fake Faculty Title',
            'department'     => 'CoMC New Fake Faculty Department',
            'room_number'    => '220B',
            'office_hours'   => 'MW: 2:00pm - 3:00pm',
            'first_degree'   => 'East Carolina University',
            'bio'            => 'This is my bio...',
            'training'       => 'I have extensive training in...',
            'research'       => 'My research entails...',
            'awards'         => 'I have received the following awards...'
        ]);

        // Create test staff team member and persist to DB: run before every test
        $this->staffTeamMember = factory(Team::class)->create([
            'eraiderID'      => 'ttesterstaff',
            'role'           => 'staff',
            'first_name'     => 'Staff',
            'last_name'      => 'Tester',
            'email'          => 'testystaff@mail.com',
            'phone_number'   => '555-444-7890',
            'title'          => 'New Fake Staff Title',
            'department'     => 'CoMC New Fake Staff Department',
            'room_number'    => '120B',
            'bio'            => 'This is my bio...',
            'training'       => 'I have extensive training in...',
            'duties'         => 'My duties include...'
        ]);
    }

    /** @test */
    public function it_can_send_request_to_update_faculty_bio_information()
    {
        $this->seeInDatabase('teams', [
                'id'             => $this->facultyTeamMember->id,
                'eraiderID'      => 'ttesterfaculty',
                'role'           => 'faculty',
                'first_name'     => 'Faculty',
                'last_name'      => 'Tester',
                'email'          => 'testyfaculty@mail.com',
                'phone_number'   => '123-456-7890',
                'title'          => 'New Fake Faculty Title',
                'department'     => 'CoMC New Fake Faculty Department',
                'room_number'    => '220B',
                'office_hours'   => 'MW: 2:00pm - 3:00pm',
                'first_degree'   => 'East Carolina University',
                'bio'            => 'This is my bio...',
                'training'       => 'I have extensive training in...',
                'research'       => 'My research entails...',
                'awards'         => 'I have received the following awards...'
             ])
             ->visit('/user-portal/ttesterfaculty')
             ->type('East Carolina University Pirate Nation', 'first_degree')
             ->type('806-444-3333', 'phone_number')
             ->type('My Updated Title', 'title')
             ->type('TTH: 12:00pm - 2:00pm', 'office_hours')
             ->type('330M', 'room_number')
             ->press('Update')
             ->seeInDatabase('team_change_profile_requests', [
                 'eraiderID'      => 'ttesterfaculty',
                 'role'           => 'faculty',
                 'first_name'     => 'Faculty',
                 'last_name'      => 'Tester',
                 'email'          => 'testyfaculty@mail.com',
                 'phone_number'   => '806-444-3333',
                 'title'          => 'My Updated Title',
                 'department'     => 'CoMC New Fake Faculty Department',
                 'room_number'    => '330M',
                 'office_hours'   => 'TTH: 12:00pm - 2:00pm',
                 'first_degree'   => 'East Carolina University Pirate Nation',
                 'bio'            => 'This is my bio...',
                 'training'       => 'I have extensive training in...',
                 'research'       => 'My research entails...',
                 'awards'         => 'I have received the following awards...'
             ])
             ->see('Your request has been sent to the Admin.');
    }
}
