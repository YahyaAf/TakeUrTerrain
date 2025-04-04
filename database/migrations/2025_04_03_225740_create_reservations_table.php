<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('terrain_id')->constrained('terrains')->onDelete('cascade');
            $table->date('date_reservation');
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->string('creneaux');
            $table->enum('status', ['en attente', 'confirmée', 'annulée'])->default('en attente');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};

