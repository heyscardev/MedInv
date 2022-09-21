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
        Schema::create('buy_medicament', function (Blueprint $table) {
     
            $table->unsignedBigInteger('buy_id');
            $table->unsignedBigInteger('medicament_id');
            $table->decimal('price',11,2);
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('buy_id')->references('id')->on('buys');
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
        Schema::dropIfExists('buy_medicament');
    }
};
