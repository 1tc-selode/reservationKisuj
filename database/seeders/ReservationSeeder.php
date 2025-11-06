<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reservation::create([
            'name' => 'aaaa3',
            'email' => 'B3@gmail.com',
            'reservation_time' => '2025-12-22 08:00:00',
            'guests' => 2,
            'note' => 'date',
        ]);

        Reservation::factory()->count(10)->create();
    }
}
