<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 30);
            $table->string('last_name', 30);
            $table->string('email')->unique();
            $table->string('photo')->nullable();
            $table->string('role', 50);
            $table->string('title', 50);
            $table->string('department', 100);
            $table->string('room_number', 50);
            $table->string('office_hours')->nullable();
            $table->string('bachelor', 100)->nullable();
            $table->string('master', 100)->nullable();
            $table->string('phd', 100)->nullable();
            $table->json('social_handles')->nullable();
            $table->text('bio');
            $table->json('courses')->nullable();
            $table->text('research')->nullable();
            $table->text('duties')->nullable();
            $table->text('training')->nullable();
            $table->text('awards')->nullable();
            $table->string('cv')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
