<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('orders', function (Blueprint $table) {
        $table->string('email')->nullable(false)->change(); // Set email to be required
    });
}

public function down()
{
    Schema::table('orders', function (Blueprint $table) {
        $table->string('email')->nullable()->change(); // Revert back to nullable if needed
    });
}

};
