<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $newMedico = new User();
            $newMedico->nome = $faker->firstname();
            $newMedico->cognome = $faker->lastname();
            $newMedico->email = $faker->email();
            $newMedico->indirizzo = $faker->secondaryAddress();
            $newMedico->specializzazione = $faker->text(40);
            $newMedico->password = $faker->password(10);
            $newMedico->save();
        }
    }
}
