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
        Schema::create('Booking', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('maintenance_id')->nullable()->unsigned();
            $table->foreign('maintenance_id')->references('id')->on('maintenance_centers')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->text('desc');
            $table->date('date')->format('m/d/Y');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_booking');
    }
};
