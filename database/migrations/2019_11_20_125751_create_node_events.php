<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNodeEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('node_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('node_id')->index();
            $table->json('raw_payload')->nullable();

            # CPU
            $table->unsignedBigInteger('cpu_user')->nullable();
            $table->unsignedBigInteger('cpu_system')->nullable();
            $table->unsignedBigInteger('cpu_idle')->nullable();

            # MEM
            $table->unsignedBigInteger('memory_total')->nullable();
            $table->unsignedBigInteger('memory_available')->nullable();
            $table->unsignedBigInteger('memory_used')->nullable();
            $table->float('memory_used_percent')->nullable();

            # DISK
            $table->unsignedBigInteger('disk_path')->nullable();
            $table->unsignedBigInteger('disk_total')->nullable();
            $table->unsignedBigInteger('disk_free')->nullable();
            $table->unsignedBigInteger('disk_used')->nullable();
            $table->float('disk_used_percent')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table
                ->foreign('node_id')
                ->references('id')
                ->on('nodes')
                ->onDelete('cascade')
            ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('node_events');
    }
}
