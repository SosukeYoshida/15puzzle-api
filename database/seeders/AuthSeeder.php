<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            "name" => "yoshida",
            "email" => "yoshida@yoshida.com",
            "password" => "yoshida",
        ]);
        User::create([
            "name" => "saito",
            "email" => "saito@saito.com",
            "password" => "saito",
        ]);
    }
}
