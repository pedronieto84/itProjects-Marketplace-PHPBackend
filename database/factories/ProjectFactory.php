<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'project_id' => $this->faker->name(20),
        'owner_id' => $this->faker->name(),
        'title' => $this->faker->sentences(),
        'published_date '  => $this->faker->date() , 
        'techset_id'  => $this->faker->name(),
        'files_array_id'  => $this->faker->name(),
        'deadline'  => $this->faker->numberBetween($min = 100000, $max =1639872000000),
        'short_explanation'  => $this->faker->sentences(),
        'state'  => $this->faker->randomElement(['accepted' , 'published' , 'refused' , 'doing' , 'finished']),
        'bid'  => $this->faker->randomDigit(),
       ];
    }
}
