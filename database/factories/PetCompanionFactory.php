<?php

namespace Database\Factories;

use App\Models\PetCompanion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PetCompanion>
 */
class PetCompanionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::create([
            'name' => fake()->name(),
            'email' => 'Accompany'.rand('000','999').'@'.rand('000','999').'test.com',
            'phone' => '050111222',
            'password' => 'password',
            'approved' => 1,
            'user_type' => 'pet_companion',
            'identity_num' => '100x9x5x1x',
        ]); 
        return [
            'user_id' => $user->id,
            'nationality' => 'سعودي',
            'experience' => '3 سنوات',
            'affiliation_link' => 'https://google.com',
        ];
    }

    public function withMedia(): Factory
    {
        return $this->afterCreating(function (PetCompanion $petCompanion) {
            $sourcePath = public_path('frontend/assets/images/user.png');
            if(file_exists($sourcePath)){
                $destinationPath = public_path('frontend/assets/images/user-temp.png');
                copy($sourcePath, $destinationPath);
            } 
            if(file_exists($sourcePath) && file_exists($destinationPath)){
                $petCompanion->addMedia($destinationPath)->toMediaCollection('photo');
            } 
        });
    }
}
