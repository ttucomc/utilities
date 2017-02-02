<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('cat1', 30);
            $table->string('cat2', 30)->nullable();
            $table->string('cat3', 30)->nullable();
            $table->string('cat4', 30)->nullable();
            $table->string('cat5', 30)->nullable();
            $table->date('date')->nullable();
            $table->string('headline', 30)->nullable();
            $table->text('story');
            $table->string('author', 50)->nullable();
            $table->string('thumbnail', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
