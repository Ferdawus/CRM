<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ClientId');
            $table->string('BussinessName')->nullable();
            $table->text('BussinessAddess')->nullable();
            $table->text('OtherBussinessAddess')->nullable();
            $table->decimal('SoftwarePrice',20,3)->nullable();
            $table->decimal('InstallationSerge',10,2)->nullable();
            $table->bigInteger('SLAType')->default(0);
            $table->decimal('SLAAmount',10,2)->nullable();
            // $table->bigInteger('BillingType');
            // $table->decimal('BillingAmount')->nullable();
            // $table->dateTime('BillingDate')->nullable();
            $table->bigInteger('ProductType');
            $table->bigInteger('ProductName')->nullable();
            $table->decimal('ProductInstallId')->nullable();
            // $table->string('ProductUrl');
            // $table->string('ProductUserName');
            // $table->string('ProductPassword');
            $table->dateTime('ProductInstallDate')->nullable();
            $table->bigInteger('RefrredBy')->nullable();
            $table->bigInteger('HostedBy')->default(0);
            // $table->bigInteger('DomainType')->default(0);
            $table->bigInteger('DomainProvide')->default(0);
            $table->text('Note')->nullable();
            $table->dateTime('ProductBillDate')->nullable();
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
        Schema::dropIfExists('services');
    }
};
