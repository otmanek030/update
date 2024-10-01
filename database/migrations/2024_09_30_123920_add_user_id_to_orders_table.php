<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('orders', function (Blueprint $table) {
        // Add the user_id column back
        $table->unsignedBigInteger('user_id')->nullable();

        // Add the foreign key constraint linking to users.id
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('orders', function (Blueprint $table) {
        // Drop the foreign key constraint first
        $table->dropForeign(['user_id']);

        // Drop the user_id column
        $table->dropColumn('user_id');
    });
}

};
