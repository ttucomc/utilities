<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Team;
use App\TeamChangeProfileRequest;

class TeamControllerTest extends TestCase
{
    use DatabaseTransactions;

    protected $facultyTeamMember;
    protected $staffTeamMember;
    protected $facultyTeamMemberWithUpdateBioRequest;

    public function setUp()
    {
        parent::setUp();

        // Create test faculty team member and persist to DB: run before every test
        $this->facultyTeamMember = factory(Team::class)->create([
            'eraiderID'      => 'ttesterfaculty',
            'position'       => 'faculty',
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
            'position'       => 'staff',
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

        // Create faculty team member and add an update faculty bio request to database
        $this->facultyTeamMemberWithUpdateBioRequest = factory(Team::class)->create([
            'eraiderID'      => 'ttesterfacultywithupdatebiorequest',
            'position'       => 'faculty',
            'first_name'     => 'FacultyWUBR',
            'last_name'      => 'TesterWUBR',
            'email'          => 'testyfacultyWUBR@mail.com',
            'phone_number'   => '123-456-5555',
            'title'          => 'Fake Faculty Title',
            'department'     => 'CoMC Fake Faculty Department',
            'room_number'    => '220B',
            'office_hours'   => 'MW: 2:00pm - 3:00pm',
            'first_degree'   => 'East Carolina University',
            'bio'            => 'This is my bio...',
            'training'       => 'I have extensive training in...',
            'research'       => 'My research entails...',
            'awards'         => 'I have received the following awards...'
        ]);
        $this->facultyTeamMemberWithUpdateBioRequest
             ->proposedProfileRequest()
             ->save(factory(TeamChangeProfileRequest::class)->make());
    }

    /** @test */
    public function it_can_send_request_to_update_faculty_bio_information()
    {
        $this->seeInDatabase('teams', [
                'id'             => $this->facultyTeamMember->id,
                'eraiderID'      => 'ttesterfaculty',
                'position'       => 'faculty',
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
                 'team_id'        => $this->facultyTeamMember->id,
                 'eraiderID'      => 'ttesterfaculty',
                 'position'       => 'faculty',
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
             ->see('Your request has been sent to an administrator for approval.');
    }

    /** @test */
    public function it_can_send_request_to_update_staff_bio_information()
    {
        $this->seeInDatabase('teams', [
                'id'             => $this->staffTeamMember->id,
                'eraiderID'      => 'ttesterstaff',
                'position'       => 'staff',
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
             ])
             ->visit('/user-portal/ttesterstaff')
             ->type('Texas Tech University', 'second_degree')
             ->type('806-124-3354', 'phone_number')
             ->type('My Updated Title', 'title')
             ->type('My new Department', 'department')
             ->type('230A', 'room_number')
             ->type('My new training duties include...', 'training')
             ->type('I was recently awarded for...', 'awards')
             ->press('Update')
             ->seeInDatabase('team_change_profile_requests', [
                 'team_id'        => $this->staffTeamMember->id,
                 'eraiderID'      => 'ttesterstaff',
                 'position'       => 'staff',
                 'first_name'     => 'Staff',
                 'last_name'      => 'Tester',
                 'email'          => 'testystaff@mail.com',
                 'phone_number'   => '806-124-3354',
                 'title'          => 'My Updated Title',
                 'department'     => 'My new Department',
                 'room_number'    => '230A',
                 'bio'            => 'This is my bio...',
                 'training'       => 'My new training duties include...',
                 'duties'         => 'My duties include...',
                 'awards'         => 'I was recently awarded for...'
             ])
             ->see('Your request has been sent to an administrator for approval.');
    }

    /** @test */
    public function it_cannot_make_another_request_to_change_bio_if_there_exists_a_pending_request()
    {
        $this->visit('/user-portal/ttesterfacultywithupdatebiorequest')
             ->see('You currently have a request to update you bio information. Please allow some time for an administrator to complete you previous request before submitting another one. Below are your proposed changes to your bio.')
             ->see('You may still upload a CV to your bio without administrator approval.');
    }
}
