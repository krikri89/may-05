<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $fantasyColor = collect();

        do {
            $fantasyColor->push($faker->safeColorName);
            $fantasyColor = $fantasyColor->unique();
        } while ($fantasyColor->count() < 10);

        foreach ($fantasyColor as $color) {
            $color  = $faker->safeColorName;
            DB::table('colors')->insert([
                'color' => $color,
                'title' => $color,
            ]);
        }
    }
}
