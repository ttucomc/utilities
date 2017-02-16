<?php

use Illuminate\Database\Seeder;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            'eraiderID'     => 'julugo',
            'first_name'    => 'Justin',
            'last_name'     => 'Lugo',
            'email'         => 'justin.m.lugo@ttu.edu',
            'phone_number'  => '252-503-1948',
            'role'          => 'faculty',
            'title'         => 'Student Web Developer',
            'department'    => 'CoMC IT Dept.',
            'room_number'   => '250C',
            'first_degree'  => 'East Carolina University',
            'bio'           => 'This is my bio...'
        ]);
    }
}
