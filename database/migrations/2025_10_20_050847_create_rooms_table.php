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
       Schema::create('rooms', function (Blueprint $t) {
    $t->id();
    $t->foreignId('room_type_id')->constrained()->cascadeOnDelete();
    $t->string('number');                         // 101, 102
    $t->enum('status', ['available','maintenance'])->default('available');
    $t->timestamps();
    $t->unique(['number']); // unik di satu hotel
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
