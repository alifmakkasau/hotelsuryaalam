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
       Schema::create('payments', function (Blueprint $t){
            $t->id();
            $t->foreignId('booking_id')->constrained()->cascadeOnDelete();
            $t->enum('method',['cash','transfer','gateway'])->default('transfer');
            $t->decimal('amount', 12, 2);
            $t->enum('status',['pending','paid','failed'])->default('pending');
            $t->string('ref')->nullable();
            $t->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
