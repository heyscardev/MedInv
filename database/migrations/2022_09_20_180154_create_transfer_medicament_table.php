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
        Schema::create('medicament_transfer', function (Blueprint $table) {
            $table->unsignedBigInteger('transfer_id');
            $table->unsignedBigInteger('medicament_id');
            $table->integer('quantity');
            $table->timestamps();
            $table->foreign('transfer_id')->references('id')->on('transfers');
            $table->foreign('medicament_id')->references('id')->on('medicaments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicament_transfer');
    }
};
