<?php

namespace Database\Factories;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       
            return [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin1234'), // password
                'remember_token' => Str::random(10),
            ];
        
    }
}
