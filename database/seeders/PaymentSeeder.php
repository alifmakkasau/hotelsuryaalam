<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Payment, Booking};
use Illuminate\Support\Str;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        $bookings = Booking::all();
        foreach ($bookings as $b) {
            // 70% booking punya pembayaran, 30% pending
            if (rand(1,100) <= 70) {
                $paidAmount = round($b->total * (rand(50,100)/100), 2); // 50–100% dari total
                Payment::firstOrCreate(
                    ['booking_id' => $b->id, 'ref' => 'INV-'.Str::upper(Str::random(6))],
                    ['method' => 'transfer', 'amount' => $paidAmount, 'status' => $paidAmount >= $b->total ? 'paid' : 'pending']
                );
            }
        }
    }
}
