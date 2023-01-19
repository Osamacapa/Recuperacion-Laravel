<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Deporte;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Deporte::factory()->create();

        User::create([
        'email' => 'majin@correo.com',
        'password' => bcrypt(12345678),
        ]);
        
    }
}
