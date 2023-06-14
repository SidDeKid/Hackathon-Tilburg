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
        Schema::create('reacties', function (Blueprint $table) {
            $table->id();
            $table->string('titel', 35);
            $table->text('reactie');
            $table->unsignedBigInteger('forum_id');
            $table->foreign('forum_id')->references('id')->on('forums');
            $table->integer('punten')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reacties');
    }
};
