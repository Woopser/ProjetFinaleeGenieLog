<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class DimensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dimensions')->insert([
            [
                'dimension' => 'XS'
            ],
            [
                'dimension' => 'S'
            ],
            [
                'dimension' => 'M'
            ],
            [
                'dimension' => 'L'
            ],
            [
                'dimension' => 'Xl'
            ],
            [
                'dimension' => 'XXl'
            ],
            [
                'dimension' => 'N\A'
            ]
        ]);
    }
}
