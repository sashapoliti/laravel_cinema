<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Functions\Helpers as Helper;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = __DIR__ . '/TableRooms.csv';
        $data = Helper::getCsvData($path);
        foreach ($data as $index => $room) {
            if($index !== 0) {
                $new_room = new Room();
                $new_room->name = $room[0];
                $new_room->alias = $room[1];
                $new_room->seats = $room[2];
                $new_room->isense = $room[3];
                $new_room->base_price = $room[4];
                $new_room->img_room = $room[5];
                $new_room->save();
            }
        
        }

    }
}
