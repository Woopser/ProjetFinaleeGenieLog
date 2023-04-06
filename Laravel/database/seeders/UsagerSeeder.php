<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usagers')->insert([
            [
                'nom' => 'Tanguay',
                'prenom' => 'Jacqueline',
                'motDePasse' => Hash::make($test1),
                'typeDeCompte' => 'Client',
                'email' => 'test1@gmail.com',
            ],
        ]);
    }
}
