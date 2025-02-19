<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'nip' => 123456789012345678,
            'username'=> 'Ade',
            'email' => 'tes@example.com',
            'password' => 'tes12345678',
            'status'=> 's',
            'kode_satker'=> 1,
        ]);
    }
}
