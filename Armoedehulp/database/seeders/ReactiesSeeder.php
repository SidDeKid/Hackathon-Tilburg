<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ReactiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reacties')->insert([
            'titel' => 'Testreactie',
            'reactie' => 'Dit is een testreactie',
            'forum_id' => 1,
            'punten' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('reacties')->insert([
            'titel' => 'Tweede testreactie',
            'reactie' => 'Dit is een 2e testreactie',
            'forum_id' => 1,
            'punten' => 10,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('reacties')->insert([
            'titel' => 'Derde testreactie',
            'reactie' => 'Dit is een 3e testreactie',
            'forum_id' => 1,
            'punten' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
