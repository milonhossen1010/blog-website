<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'         =>  $this->faker->sentence(5, true),
            'slug'          =>  str_replace(' ', '-', $this->faker->sentence(5, true)),
            'image'         => 'https://picsum.photos/id/' . rand(1, 200) . '/600/400',
            'description'   => $this->faker->paragraph(10),
            'user_id'       => 1
        ];
    }
}
