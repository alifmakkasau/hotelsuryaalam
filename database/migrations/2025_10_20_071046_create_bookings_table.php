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
        Schema::create('bookings', function (Blueprint $t){
            $t->id();
            $t->foreignId('room_type_id')->constrained()->cascadeOnDelete();
            $t->foreignId('guest_id')->constrained()->cascadeOnDelete();
            $t->date('check_in');
            $t->date('check_out');
            $t->integer('qty')->default(1);
            $t->decimal('price_per_night', 12, 2);
            $t->decimal('total', 12, 2);
            $t->enum('status',['pending','confirmed','checked_in','checked_out','cancelled'])->default('pending');
            $t->string('code')->unique();
            $t->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
