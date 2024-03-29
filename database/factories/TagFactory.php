<?php

namespace Database\Factories;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'          =>  $this->faker->unique()->sentence(1),
            // 'slug'       =>  str_replace(' ','-',$this->faker->unique()->sentence(1)),
            'slug'          =>  Str::slug($this->faker->unique()->sentence(1)),
            'description'   =>  $this->faker->sentence(10)
        ];
    }
}
