<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;


class CouleurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('couleurs')->insert([
            [
                'nom' => 'Purple',
                'codeRGB' => '800080'
            ],
            [
                'nom' => 'Antiq Cherry Red',
                'codeRGB' => 'D2042D'
            ],
            [
                'nom' => 'Antique Sapphire',
                'codeRGB' => '0f52ba'
            ],
            [
                'nom' => 'Black',
                'codeRGB' => '000000'
            ],
            [
                'nom' => 'Red',
                'codeRGB' => 'ff0000'
            ],
            [
                'nom' => 'Royal',
                'codeRGB' => '9b1c31'
            ],
            [
                'nom' => 'Marron',
                'codeRGB' => '800000'
            ],
            [
                'nom' => 'Military Green',
                'codeRGB' => '4b5320'
            ],
            [
                'nom' => 'Navy',
                'codeRGB' => '000080'
            ],
            [
                'nom' => 'Dark Chocolate',
                'codeRGB' => '352620'
            ],
            [
                'nom' => 'Dark Heather',
                'codeRGB' => '352620'
            ],
            [
                'nom' => 'Forest Green',
                'codeRGB' => '394C42'
            ]
        ]);
    }
}
