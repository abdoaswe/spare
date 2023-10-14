<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('merchant', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->unique();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('idm')->unique()->nullable(false);
            $table->string('idmfront')->nullable(false);
            $table->string('idmback')->nullable(false);
            $table->string('crmfront')->nullable(false);
            $table->string('crmback')->nullable(false);
            // $table->string('commercial_register');
            $table->integer('rate')->nullable();
            $table->softDeletes();



            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchant');
    }
};
