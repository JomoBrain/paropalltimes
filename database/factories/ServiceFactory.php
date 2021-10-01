<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence(3),
            'services'=>$this->faker->paragraph(20),
            'user_id'=>$this->faker->randomNumber([1,2,3,4]),
            
            'image'=>'https://source.unsplash.com/random',

        ];
    }
}
