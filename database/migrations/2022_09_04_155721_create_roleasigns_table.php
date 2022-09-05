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
        Schema::create('roleasigns', function (Blueprint $table) {
            $table->id();
            $table->string('Menu')->nullable();
            $table->boolean('View')->default(0);
            $table->boolean('Create')->default(0);
            $table->boolean('Edit')->default(0);
            $table->boolean('Delete')->default(0);
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
        Schema::dropIfExists('roleasigns');
    }
};
