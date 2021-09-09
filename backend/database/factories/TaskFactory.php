<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $i = rand(100, 1000);  
        return [
            'title' => 'title' . $i,
            'content' => 'content' . $i,
            'person_in_charge' => 'person_in_charge' . $i,
        ];
    }
}
