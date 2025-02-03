<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('episodes', function (Blueprint $table) {
    //         $table->id();
    //         $table->timestamps();
    //     });
    // }



    public function up()
{
    Schema::create('episodes', function (Blueprint $table) {
        $table->id();
        // $table->string('story_id', 36); // Match wink_posts.id
        $table->char('story_id', 36);
        $table->string('title');
        $table->text('content');
        $table->unsignedBigInteger('created_by'); // Author
        $table->timestamps();


        $table->foreign('story_id')->references('id')->on('wink_posts')->onDelete('cascade');
        $table->foreign('created_by')->references('id')->on('users');

        // $table->unsignedBigInteger('story_id'); // Replace string with unsignedBigInteger
        // $table->foreign('story_id')->references('id')->on('stories')->onDelete('cascade');

    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episodes');
    }
}
