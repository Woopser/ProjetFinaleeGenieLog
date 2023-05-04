<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;
class UsagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comptes')->insert([
            [
                'nom' => 'admin',
                'prenom' => 'super',
                'password' => Hash::make("superadmin"),
                'typeCompte' => 'SuperAdmin',
                'email' => 'superAdmin@root.com',
            ],
        ]);
    }
}
