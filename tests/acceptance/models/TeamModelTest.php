<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Team;
use App\TeamChangeProfileRequest;

class TeamModelTest extends TestCase
{
    use DatabaseTransactions;

    protected $teamMember;

    public function setUp()
    {
        parent::setUp();

        // Refer to the TeamChangeProfileReqest factory for more details on what
        // is in each field.
        $this->teamMember = factory(Team::class)->create();
        $this->teamMember->proposedProfileRequest()
                        ->save(factory(TeamChangeProfileRequest::class)->make());
    }

    /** @test */
    public function it_matches_the_team_id_foreign_key_in_the_change_profile_requests_table()
    {
        $this->assertEquals($this->teamMember->id, $this->teamMember->proposedProfileRequest()->first()->team_id);
    }
}
