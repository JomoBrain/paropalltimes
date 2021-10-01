<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name,
            'email'=>$this->faker->email,
            'occupation'=>$this->faker->jobTitle,
            'message'=>$this->faker->paragraph,
            'user_id'=>$this->faker->randomNumber([1,2,3,4]),
            'image'=>'https://source.unsplash.com/random',

        ];
    }
}
