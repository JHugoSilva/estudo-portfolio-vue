<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'Jao Silva',
            'email' => 'j@email.com',
            'subject' => 'Subject of message',
            'description' => 'Description message .....',
            'status' => '0'
        ];
    }
}
