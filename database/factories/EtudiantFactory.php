<?php

namespace Database\Factories;

use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;
use Carbon\Carbon;

class EtudiantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Etudiant::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        $faker = FakerFactory::create('fr_CA');

        // fake un nom et le store dans une variable
        $name = $faker->name();


        // Génère un age de 17 ans et plus
        $minDate = Carbon::now()->subYears(17)->subYears(17);
        $maxDate = Carbon::now()->subYears(17);
        $dateNaissance = $faker->dateTimeBetween($minDate, $maxDate);

        // Crée un étudiant lié a un User
        return[
            'nom'               => $name,
            'adresse'           => $faker->address(),
            'phone'             => $faker->phoneNumber(),
            'email'             => preg_replace('/[^A-Za-z0-9]/', '', str_replace(' ', '.', strtolower(trim(iconv('UTF-8', 'ASCII//TRANSLIT', $name))))) . '@' . $faker->safeEmailDomain(),
            'date_naissance'    => $dateNaissance->format('Y-m-d'),
            'ville_id'          => Ville::inRandomOrder()->first()->id,
        ];



    }
}
