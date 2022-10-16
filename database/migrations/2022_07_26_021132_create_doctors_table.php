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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('code',30)->unique();
            $table->string('c_i',10)->unique();
            $table->string('first_name',80);
            $table->string('last_name',80);
            $table->enum('gender',['Male','Female']);
            $table->date('birth_date');
            $table->string('email')->nullable();
            $table->string('phone',20);
            $table->unsignedBigInteger('service_id');
            $table->timestamps();
            $table->foreign('service_id')->references('id')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
};
