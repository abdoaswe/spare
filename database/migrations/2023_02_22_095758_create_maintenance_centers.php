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
        Schema::create('maintenance_centers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->unique();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('idmc')->unique()->nullable(false);
            $table->string('idmcfront')->nullable();
            $table->string('idmcback')->nullable();
            $table->string('crmcfront')->nullable();
            $table->string('crmcback')->nullable();


            $table->string('center_name')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('img_logo')->nullable();
            $table->string('img_cover')->nullable();
            $table->string('start_day')->nullable();
            $table->string('end_day')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->longText('desc')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_centers');
    }
};
