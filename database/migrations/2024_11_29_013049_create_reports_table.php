<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('reports', function (Blueprint $table) {
    //         $table->id();
    //         $table->timestamps();
    //     });
    // }

    public function up()
{
    Schema::create('reports', function (Blueprint $table) {
        $table->id();
        $table->string('content_id'); // Ensure the type matches 'id' in wink_posts
        $table->unsignedBigInteger('reported_by');
        $table->text('reason');
        $table->enum('status', ['pending', 'resolved', 'quarantined']);
        $table->timestamps();
    
        $table->foreign('content_id')->references('id')->on('wink_posts')->onDelete('cascade');
        $table->foreign('reported_by')->references('id')->on('users');
    });
    
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
