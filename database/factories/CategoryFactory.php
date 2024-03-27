<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    { $name = fake()->word();
        return [
            //
          
            'name_fr' => $name. '_fr',
              'name_en' => $name. '_en',
              'slug' => str::slug($name)
        ];
    }
}
