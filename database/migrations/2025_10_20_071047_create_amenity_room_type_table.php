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
        Schema::create('amenity_room_type', function (Blueprint $t){
            $t->id();
            $t->foreignId('amenity_id')->constrained()->cascadeOnDelete();
            $t->foreignId('room_type_id')->constrained()->cascadeOnDelete();
            $t->unique(['amenity_id','room_type_id']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amenity_room_type');
    }
};
