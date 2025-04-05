<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('terrain_id');
            $table->unsignedBigInteger('user_id'); 
            $table->text('commentaire');
            $table->tinyInteger('note')->default(5); 
            $table->timestamps();

            $table->foreign('terrain_id')->references('id')->on('terrains')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};

