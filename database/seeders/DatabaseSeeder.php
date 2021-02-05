<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Саня',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('users')->insert([
            'name' => 'Костя',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('users')->insert([
            'name' => 'Гоша',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $userIds = \App\Models\User::pluck('id')->toArray();

        $drawings = [];
        for ($i = 0; $i < 100; $i++) {
            $drawing['user_id'] = $userIds[\array_rand($userIds)];
            $drawing['url'] = 'https://c.wallhere.com/photos/7d/c4/1920x1200_px_actress_Blonde_celebrity_Chlo_Grace_Moretz_women-652578.jpg!d';
            $drawing['created_at'] = Carbon::now();
            $drawing['updated_at'] = Carbon::now();
            $drawings[] = $drawing;
        }

        \App\Models\Drawing::insert($drawings);
    }
}
