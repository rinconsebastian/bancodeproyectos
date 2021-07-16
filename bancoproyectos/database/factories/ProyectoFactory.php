<?php

namespace Database\Factories;

use App\Models\Proyecto;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProyectoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proyecto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
        'fuente' => $this->faker->randomElement(['Propios','Regalias','Cooperación']),
        'fase' => $this->faker->randomElement(['I','II','III','IV']),
        'valor' => $this->faker->randomNumber(8),
        'sector' => $this->faker->randomElement(['Salud','Educación','Infraestrcutura','Mobiliario','Vías']),
        'tiempo' => random_int(1,48),
        'estado' =>$this->faker->randomElement(['Borrador','Presentado','Revision','Ajustes','Aprobado',"Rechazado"]),
        'user_id' => User::inRandomOrder()->take(1)->first()->id
            //
        ];
    }
}
