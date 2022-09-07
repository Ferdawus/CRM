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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('Client');
            $table->string('ContactNumber')->nullable();
            $table->string('AltnativeContact')->nullable();
            $table->string('Country')->nullable();
            $table->string('District')->nullable();
            $table->string('RefrredBy')->nullable();
            $table->string('Photo',500)->nullable();
            $table->string('Address',500)->nullable();
            $table->string('OthersInf',500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
