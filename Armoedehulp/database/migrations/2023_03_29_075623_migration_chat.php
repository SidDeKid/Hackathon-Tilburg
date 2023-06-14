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
        Schema::create('chat', function (Blueprint $table) {
            $table->id();
            $table->dateTime('tijd');
            $table->text('bericht');
            $table->boolean('van');
            $table->unsignedBigInteger('expertid');
            $table->foreign('expertid')->references('id')->on('experts');
            $table->unsignedBigInteger('werknemerid');
            $table->foreign('werknemerid')->references('id')->on('werknemers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat');
    }
};
