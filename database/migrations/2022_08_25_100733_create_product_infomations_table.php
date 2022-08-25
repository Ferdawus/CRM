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
        Schema::create('product_infomations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ClientID');
            $table->foreignId('BusinessID');
            $table->string('ProductUserID');
            $table->string('Password');
            $table->string('RefrredBy')->nullable();
            $table->string('HostedBy')->nullable();
            $table->string('Domain')->nullable();
            $table->string('RenewDate')->nullable();
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
        Schema::dropIfExists('product_infomations');
    }
};
