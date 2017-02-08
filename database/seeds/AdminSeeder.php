<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name'    => 'Justin',
            'last_name'     => 'Lugo',
            'email'         => 'justin.m.lugo@ttu.edu',
            'password'      => bcrypt('secret'),
            'is_admin'      => 1,
        ]);
    }
}
