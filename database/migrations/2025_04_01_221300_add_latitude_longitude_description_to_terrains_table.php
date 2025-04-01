<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('terrains', function (Blueprint $table) {
            $table->decimal('latitude', 10, 4)->nullable()->after('name'); 
            $table->decimal('longitude', 10, 4)->nullable()->after('latitude'); 
            $table->text('description')->nullable()->after('longitude'); 
        });
    }

    public function down()
    {
        Schema::table('terrains', function (Blueprint $table) {
            $table->dropColumn(['latitude', 'longitude', 'description']);
        });
    }
};
