<?php

use Illuminate\Database\Seeder;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //import library faker
        $faker = Faker\Factory::create();

        //batasan banyak data
        $limit = 10;

        for($i=0; $i<$limit; $i++)
        {
            DB::table('artikel')->insert([
                'judul' => $faker->title,
                'slug_judul' => $faker->title,
                'isi' => $faker->paragraph,
                'gambar' => $faker->name
            ]);
        }
    }
}
