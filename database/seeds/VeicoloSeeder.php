<?php

use Illuminate\Database\Seeder;
use App\Fabricante;
use App\Veicolo;
use Faker\Factory as Faker;

class VeicoloSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
                $faker = Faker::create();
                $cantitad = Fabricante::all()->count();
                for($i=0; $i < $cantitad; $i++){
                    Veicolo::create([
                        'colore' => $faker->safeColorName(),
                        'cilindrata' => $faker->randomFloat(),
                        'potenza' => $faker->randomNumber(),
                        'peso' => $faker->randomFloat(),
                        'fabricante_id' => $faker->numberBetween(1, $cantitad)
                    ]);
                }
	}

}
