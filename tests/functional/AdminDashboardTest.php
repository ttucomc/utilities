<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Contracts\Auth\Authenticatable;

use App\User;

class AdminDashboardTest extends TestCase
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
    public function admin_can_see_the_search_bar_to_search_for_faculty_or_staff_or_news_articles()
    {
        $this->actingAs($this->adminUser)
             ->visit('/admin-portal')
             ->see('Faculty/Staff or News articles'); // text in search bar
    }

    /** @test */
    public function admin_can_see_option_to_modify_their_profile()
    {
        $this->actingAs($this->adminUser)
             ->visit('/admin-portal')
             ->see('Profile');
    }

    /** @test */
    public function admin_can_see_option_to_create_a_new_faculty_member()
    {
        $this->actingAs($this->adminUser)
             ->visit('/admin-portal')
             ->click('faculty-staff') //'name' attribute on dropdown selector
             ->see('Create Faculty');
    }

    /** @test */
    public function admin_can_see_option_to_create_a_new_staff_member()
    {
        $this->actingAs($this->adminUser)
             ->visit('/admin-portal')
             ->click('faculty-staff') //'name' attribute on dropdown selector
             ->see('Create Staff');
    }
}
