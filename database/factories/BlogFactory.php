<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->sentence(5),
            'body'=>$this->faker->paragraph,
            
            
            'user_id'=>$this->faker->randomNumber([1,2,3,4]),
            'image'=>'https://source.unsplash.com/random',

        ];
    }
}
