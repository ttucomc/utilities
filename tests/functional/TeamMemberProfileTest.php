<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Team;

class UserUpdateProfileTest extends TestCase
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
    }

    /** @test */
    public function it_can_visit_the_user_profile_and_see_a_welcome_message_for_the_particular_faculty_member()
    {
        $this->visit('/user-portal/ttesterfaculty')
             ->see('Welcome ' . $this->facultyTeamMember->first_name)
             ->see('Make changes to your bio below. Please note that your changes will be submitted to an administrator for final approval. Approval of changes may take 24-48 hours to finalize.');
    }

    /** @test */
    public function it_can_visit_the_user_profile_and_see_a_welcome_message_for_the_particular_staff_member()
    {
        $this->visit('/user-portal/ttesterstaff')
             ->see('Welcome ' . $this->staffTeamMember->first_name)
             ->see('Make changes to your bio below. Please note that your changes will be submitted to an administrator for final approval. Approval of changes may take 24-48 hours to finalize.');
    }

    /** @test */
    public function it_can_see_all_faculty_bio_information_on_the_page()
    {
        $this->visit('/user-portal/ttesterfaculty')
             ->see($this->facultyTeamMember->first_name)
             ->see($this->facultyTeamMember->last_name)
             ->see($this->facultyTeamMember->phone_number)
             ->see($this->facultyTeamMember->title)
             ->see($this->facultyTeamMember->department)
             ->see($this->facultyTeamMember->room_number)
             ->see($this->facultyTeamMember->office_hours)
             ->see($this->facultyTeamMember->first_degree)
             ->see($this->facultyTeamMember->bio)
             ->see($this->facultyTeamMember->training)
             ->see($this->facultyTeamMember->research)
             ->see($this->facultyTeamMember->awards);
    }

    /** @test */
    public function it_can_see_all_staff_bio_information_on_the_page()
    {
        $this->visit('/user-portal/ttesterstaff')
             ->see($this->staffTeamMember->first_name)
             ->see($this->staffTeamMember->last_name)
             ->see($this->staffTeamMember->phone_number)
             ->see($this->staffTeamMember->title)
             ->see($this->staffTeamMember->department)
             ->see($this->staffTeamMember->room_number)
             ->see($this->staffTeamMember->first_degree)
             ->see($this->staffTeamMember->bio)
             ->see($this->staffTeamMember->training);
    }

    /** @test */
    public function it_cannot_see_cv_upload_accordion_if_team_member_is_a_staff_member()
    {
        $this->visit('/user-portal/ttesterstaff')
             ->dontSee('Add Your CV');
    }

    /** @test */
    public function it_can_see_cv_upload_accordion_if_team_member_is_a_faculty_member_and_they_dont_already_have_a_stored_cv_in_the_database()
    {
        $this->visit('/user-portal/ttesterfaculty')
             ->see('Add Your CV');
    }
}
