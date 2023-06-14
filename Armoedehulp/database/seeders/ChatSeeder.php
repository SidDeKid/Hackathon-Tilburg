<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;


class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chat')->insert([
            'tijd' => '2023-03-29 10:50:00',
            'bericht' => 'Dit is een testbericht',
            'van' => true,
            'expertid' => 1,
            'werknemerid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('chat')->insert([
            'tijd' => '2023-03-29 10:50:00',
            'bericht' => 'Dit is een 2e testbericht',
            'van' => false,
            'expertid' => 1,
            'werknemerid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('chat')->insert([
            'tijd' => '2023-03-29 10:50:00',
            'bericht' => 'Dit is een 3e testbericht',
            'van' => false,
            'expertid' => 1,
            'werknemerid' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
