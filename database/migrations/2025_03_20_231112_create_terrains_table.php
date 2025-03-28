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
        Schema::create('terrains', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('photo');
            $table->float('prix');
            $table->foreignId('categorie_id')->constrained('categories')->onDelete('cascade'); 
            $table->enum('statut', ['pending', 'accepted', 'refuse'])->default('pending'); 
            $table->enum('disponibility', ['disponible', 'indisponible'])->default('disponible'); 
            $table->string('adresse');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('terrains');
    }
};
