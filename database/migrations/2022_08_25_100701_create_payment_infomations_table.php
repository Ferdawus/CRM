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
        Schema::create('payment_infomations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ClientID');
            $table->string('InstallationSerge');
            $table->string('SLA-Type');
            $table->integer('SLA-Amount');
            $table->dateTime('SLA-ByingDate');
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
        Schema::dropIfExists('payment_infomations');
    }
};
