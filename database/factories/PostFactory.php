<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    { $title = fake()->sentence();

        return [
            //
           
           
            'title_en' => $title. '_en',
            'slug' => Str::slug($title),
          
            'body_en' => fake()->paragraph(). '_en',
            'photo' => fake()->imageUrl(1040, 680),
            'category_id' => fake()->numberBetween(1, 10),
         
            'like' => $this->faker->numberBetween(0, 100), // Ajouter un nombre aléatoire de likes
            'dislike' => $this->faker->numberBetween(0, 100),
            'user_id' => $this->faker->numberBetween(1, 100),
        ];
    }
}
