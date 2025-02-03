<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrganizationIdToWinkUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
//     public function up()
// {
//     Schema::table('users', function (Blueprint $table) {
//         $table->unsignedBigInteger('organization_id')->nullable();

//         $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
//     });
// }



public function up()
{
    Schema::table('users', function (Blueprint $table) {
        if (!Schema::hasColumn('users', 'organization_id')) {
            $table->unsignedBigInteger('organization_id')->nullable()->after('id');
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
        }
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        if (Schema::hasColumn('users', 'organization_id')) {
            $table->dropForeign(['organization_id']);
            $table->dropColumn('organization_id');
        }
    });
}




    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // public function down()
    // {
    //     Schema::table('users', function (Blueprint $table) {
    //         //
    //     });
    // }
}
