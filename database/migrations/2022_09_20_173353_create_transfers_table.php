<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('module_send_id');
            $table->unsignedBigInteger('module_receive_id');
            $table->string('description', 250);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('module_send_id')->references('id')->on('modules');
            $table->foreign('module_receive_id')->references('id')->on('modules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfers');
    }
};
