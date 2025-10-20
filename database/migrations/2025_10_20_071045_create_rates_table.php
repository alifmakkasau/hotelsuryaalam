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
        Schema::create('rates', function (Blueprint $t){
            $t->id();
            $t->foreignId('room_type_id')->constrained()->cascadeOnDelete();
            $t->date('date');
            $t->decimal('price', 12, 2);
            $t->integer('allotment')->default(0); // kuota harian tipe kamar
            $t->timestamps();
            $t->unique(['room_type_id','date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rates');
    }
};
