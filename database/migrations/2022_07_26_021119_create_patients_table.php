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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('n_history',30)->unique();
            $table->enum('nationality',["V","E"]);
            $table->string('c_i',10)->unique();
            $table->string('first_name',80);
            $table->string('last_name',80);
            $table->enum('gender',['Male','Female']);
            $table->date('birth_date');
            $table->boolean('child')->default(false);
            $table->string('email')->nullable();
            $table->string('phone',20);
            $table->string('direction',250)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
};
