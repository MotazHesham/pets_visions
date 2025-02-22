<?php

namespace Database\Factories;

use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::create([
            'name' => 'Owner Name',
            'email' => 'Store'.rand('000','999').'@'.rand('000','999').'test.com',
            'phone' => '050111222',
            'password' => 'password',
            'approved' => 1,
            'user_type' => 'store',
            'identity_num' => '100x9x5x1x',
        ]);
        return [ 
            'user_id' => $user->id, 
            'store_name' => 'بيتز شوب',
            'store_phone' => '050111222',
            'address' => 'الدمام, جدة, المملكة السعودية',
        ];
    }
    public function withMedia(): Factory
    {
        return $this->afterCreating(function (Store $store) {
            $sourcePath2 = public_path('frontend/assets/images/shop_banner.jpg');
            if(file_exists($sourcePath2)){
                $destinationPath2 = public_path('frontend/assets/images/shop_banner_temp.jpg');
                copy($sourcePath2, $destinationPath2);
            } 
            if(file_exists($sourcePath2) && file_exists($destinationPath2)){
                $store->addMedia($destinationPath2)->toMediaCollection('cover');
            } 

            $sourcePath3 = public_path('frontend/assets/images/market01.png');
            if(file_exists($sourcePath3)){
                $destinationPath3 = public_path('frontend/assets/images/market01-temp.png');
                copy($sourcePath3, $destinationPath3);
            } 
            if(file_exists($sourcePath3) && file_exists($destinationPath3)){
                $store->addMedia($destinationPath3)->toMediaCollection('logo');
            }  
        });
    }
}
