<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class comentarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Configurar Faker para generar datos en español
        $faker = Faker::create('es_ES');

        // Obtener IDs de diarios existentes
        $idsDiarios = DB::table('diarios')->pluck('id');

        for ($i = 0; $i < 50; $i++) {
            DB::table('comentarios')->insert([
                'titulo' => $faker->sentence(),
                'contenido' => $faker->paragraph(),
                'fecha_creacion' => $faker->dateTimeThisMonth(),
                'diario_id' => $faker->randomElement($idsDiarios),
            ]);
    }
}
}