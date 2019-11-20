<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablesAddUuids extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nodes', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
        });

        Schema::table('node_hardware', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
        });

        Schema::table('node_events', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->uuid('uuid')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
