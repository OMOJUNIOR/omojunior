<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\UserFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ContentRequestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */

    protected $model = \App\Modules\Content\Models\ContentRequest::class;
    

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         $user = UserFactory::new()->create();
       
        return [
            'language' => $this->faker->word,
            'word_count' => $this->faker->randomNumber(),
            'topic' => $this->faker->sentence,
            'delivery_date' => $this->faker->dateTime(),
            'project_id' => $this->faker->randomNumber(),
            'user_id' => $user->id,
        ];
    }
}
