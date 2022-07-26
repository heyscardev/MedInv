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
        Schema::create('medicaments', function (Blueprint $table) {
            $table->id();
            $table->string('code',25)->unique();
            $table->string('name',100);
            $table->unsignedBigInteger('medicament_group_id')->nullable();
            $table->unsignedBigInteger('unit_id');
            $table->decimal('price_sale',11,2)->default(0.00);
            $table->timestamps();
            $table->foreign('medicament_group_id')->references('id')->on('medicament_groups');
            $table->foreign('unit_id')->references('id')->on('units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicaments');
    }
};
