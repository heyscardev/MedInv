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
        Schema::create('recipe_medicament_unit', function (Blueprint $table) {
            $table->unsignedBigInteger('recipe_id');
            $table->unsignedBigInteger('medicament_id');
            $table->integer('prescribed_amount');
            $table->integer('quantity_deliver');
            $table->decimal('price',11,2);
            $table->string('description',250)->nullable();
            $table->timestamps();
            $table->foreign('recipe_id')->references('id')->on('recipes');
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
        Schema::dropIfExists('recipe_medicament');
    }
};
