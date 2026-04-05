<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Cria o usuário de teste (que você já tinha)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // 2. Chama o cadastro dos produtos (A parte nova)
        // Isso faz o Laravel ler o arquivo ProductSeeder.php que corrigimos
        $this->call([
            ProductSeeder::class,
        ]);
    }
}