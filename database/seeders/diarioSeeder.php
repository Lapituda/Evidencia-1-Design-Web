<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class diarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Configurar Faker para generar datos en español
        $faker = Faker::create('es_ES');

        // Obtener IDs de categorías existentes y usuarios existentes
        $idsCategorias = DB::table('categorias')->pluck('id');
        $idsUsuarios = DB::table('users')->pluck('id');

        for ($i = 0; $i < 50; $i++) {
            DB::table('diarios')->insert([
                'titulo' => $faker->sentence(),
                'contenido' => $faker->paragraph(),
                'fecha_creacion' => $faker->dateTimeThisMonth(),
                'categoria_id' => $faker->randomElement($idsCategorias),
                'usuario_id' => $faker->randomElement($idsUsuarios),
            ]);
        }
    }
}