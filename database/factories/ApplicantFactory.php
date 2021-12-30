<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'created_at' => $this->faker->dateTimeThisMonth(),
            'updated_at' => $this->faker->dateTimeThisMonth(),
            'loan_id' => uniqid(),
            'finance_amount' => $this->faker->randomNumber(5, true),
            'period' => $this->faker->dateTimeInInterval('1 days','3 week'),
            'fullname' => $this->faker->userName(),
            'nric' => $this->faker->word(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->unique()->phoneNumber(),
            'birthdate' => $this->faker->date(),
            'dependants' => $this->faker->randomDigit(),
            'employment' => 'employeed',
            'id_front' => $this->faker->word(),
            'id_back' => $this->faker->word(),
            'salary_slip'     => $this->faker->randomNumber(5,true),
            'utilities_slip'  =>$this->faker->randomNumber(5,true),
            'status'          => 'pending',
        ];
    }
}
