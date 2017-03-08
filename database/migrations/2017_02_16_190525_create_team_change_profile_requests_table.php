<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamChangeProfileRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_change_profile_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->unsigned();
            $table->string('eraiderID');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->string('photo')->nullable();
            $table->string('position')->nullable();
            $table->string('title');
            $table->string('department');
            $table->string('room_number')->nullable();
            $table->string('office_hours')->nullable();
            $table->string('first_degree')->nullable();
            $table->string('second_degree')->nullable();
            $table->string('third_degree')->nullable();
            $table->text('social_handles')->nullable();
            $table->text('bio')->nullable();
            $table->text('courses')->nullable();
            $table->text('research')->nullable();
            $table->text('duties')->nullable();
            $table->text('training')->nullable();
            $table->text('awards')->nullable();
            $table->string('cv')->nullable();
            $table->timestamps();
        });

        Schema::table('team_change_profile_requests', function($table) {
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('team_change_profile_requests');
        Schema::enableForeignKeyConstraints();
    }
}
