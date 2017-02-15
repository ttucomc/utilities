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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->string('photo')->nullable();
            $table->string('role')->nullable();
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
