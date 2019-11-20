<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNodeHardware extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('node_hardware', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('node_id')->index();
            $table->timestamps();
            $table->softDeletes();

            $table->string('hostname')->nullable();
            $table->string('hostid')->nullable();
            $table->string('os')->nullable();
            $table->string('os_platform')->nullable();
            $table->string('os_platform_family')->nullable();
            $table->string('os_platform_version')->nullable();
            $table->string('kernel_version')->nullable();
            $table->string('kernel_arch')->nullable();

            $table->string('cpu_vendor_id')->nullable();
            $table->string('cpu_family')->nullable();
            $table->string('cpu_model_name')->nullable();
            $table->unsignedInteger('cpu_cores')->nullable();
            $table->unsignedInteger('cpu_mhz')->nullable();

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
        Schema::dropIfExists('node_hardware');
    }
}
