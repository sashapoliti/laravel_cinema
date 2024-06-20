<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Slot;

class SlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slot = [
            [
                'time_slot' => 'mattina',
                'start_time' => '09:00',
                'end_time' => '12:00',
            ],
            [
                'time_slot' => 'pomeriggio',
                'start_time' => '17:00',
                'end_time' => '20:00',
            ],
            [
                'time_slot' => 'sera',
                'start_time' => '20:00',
                'end_time' => '23:00',
            ],
        ];
        foreach ($slot as $key => $value) {
            $new_slot = new Slot();
            $new_slot->time_slot = $value['time_slot'];
            $new_slot->start_time = $value['start_time'];
            $new_slot->end_time = $value['end_time'];
            $new_slot->save();
        }
    }
}
