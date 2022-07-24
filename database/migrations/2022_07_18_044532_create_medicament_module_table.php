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
        Schema::create('medicament_module', function (Blueprint $table) {
            $table->unsignedBigInteger('medicament_id');
            $table->unsignedBigInteger('module_id');
            $table->integer('quantity_exist')->default(0);
            $table->timestamps();
            $table->foreign('medicament_id')->references('id')->on('medicaments');
            $table->foreign('module_id')->references('id')->on('modules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicament_module');
    }
};
