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
                'dimension' => 'Très petit'
            ],
            [
                'dimension' => 'Petit'
            ],
            [
                'dimension' => 'Moyen'
            ],
            [
                'dimension' => 'Grand'
            ],
            [
                'dimension' => 'Très grand'
            ],
            [
                'dimension' => 'Très très grand'
            ],
            [
                'dimension' => 'Ne s\'applique pas'
            ]
        ]);
    }
}
