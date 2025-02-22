<?php

namespace Database\Factories;

use App\Models\Clinic;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clinic>
 */
class ClinicFactory extends Factory
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
            'email' => 'clinic'.rand('000','999').'@'.rand('000','999').'test.com',
            'phone' => '050111222',
            'password' => 'password',
            'approved' => 1,
            'identity_num' => '100x9x5x1x',
            'user_type' => 'clinic',
        ]);
        return [   
            'rating' => rand(0,5), 
            'user_id' => $user->id,
            'clinic_name' => 'بيتز شوب',
            'short_description' => 'short_description',
            'address' => 'الدمام, جدة, المملكة السعودية',
            'clinic_phone' => '050111222',
            'unified_phone' => '1905',
            'about_us' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.

إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.

ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى أن يوفر على المصمم عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.',
        ];
    }
    
    
    public function withMedia(): Factory
    {
        return $this->afterCreating(function (Clinic $clinic) {
            $sourcePath = public_path('frontend/assets/images/pet2.jpg');
            if(file_exists($sourcePath)){
                $destinationPath = public_path('frontend/assets/images/pet2-temp.jpg');
                copy($sourcePath, $destinationPath);
            } 
            if(file_exists($sourcePath) && file_exists($destinationPath)){
                $clinic->addMedia($destinationPath)->toMediaCollection('banner');
            }
        
            $sourcePath2 = public_path('frontend/assets/images/shop_banner.jpg');
            if(file_exists($sourcePath2)){
                $destinationPath2 = public_path('frontend/assets/images/shop_banner_temp.jpg');
                copy($sourcePath2, $destinationPath2);
            } 
            if(file_exists($sourcePath2) && file_exists($destinationPath2)){
                $clinic->addMedia($destinationPath2)->toMediaCollection('cover');
            } 
        
            $sourcePath3 = public_path('frontend/assets/images/market01.png');
            if(file_exists($sourcePath3)){
                $destinationPath3 = public_path('frontend/assets/images/market01-temp.png');
                copy($sourcePath3, $destinationPath3);
            } 
            if(file_exists($sourcePath3) && file_exists($destinationPath3)){
                $clinic->addMedia($destinationPath3)->toMediaCollection('logo');
            }  
        });
    }
}
