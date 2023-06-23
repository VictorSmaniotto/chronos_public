<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('pt_BR');

        User::create([
            'nome' => 'Victor R Smaniotto',
            'email' => 'victor.rsmaniotto@senacsp.edu.br',
            'password' => bcrypt('admin@smaniotto23'),
            'remember_token' => Str::random(10),
            'perfil' => 'administrador'
        ], [
            'nome' => 'Lais M Osaka',
            'email' => 'lais.mosaka@senacsp.edu.br',
            'password' => bcrypt('admin@osaka23'),
            'remember_token' => Str::random(10),
            'perfil' => 'administrador'
        ]);

        foreach (range(1, 10) as $index) {
            User::create([
                'nome' => $faker->name,
                'email' => $faker->unique()->safeEmail(),
                'password' => bcrypt('12345678'),
                'remember_token' => Str::random(10)
            ]);
        }
    }
}
