<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {  //$filepath = 'public/storage/posts';
        return [
            'url' => fake()->imageUrl($width=400, $height=400),
            // 'url' => $this->faker->image($filepath, 640, 480, null, true)//image.jpg
        ];
    }
}
