<?php

namespace Database\Factories;

use App\Models\Hosting;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hosting>
 */
class HostingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = array_keys(Hosting::HOSTING_TYPE_SELECT);
        $user = User::create([
            'name' => 'Owner Name',
            'email' => 'Hosting'.rand('000','999').'@'.rand('000','999').'test.com',
            'phone' => '050111222',
            'password' => 'password',
            'approved' => 1,
            'user_type' => 'host',
        ]); 
        return [
            'user_id' => $user->id,
            'hosting_name' => 'Owner Name',
            'address' => 'الدمام, جدة, المملكة السعودية',
            'hosting_phone' => '050111222',
            'about_us' => 'نوفر لحيوانك الاليف الرعاية الصحية : حيث يتم فحصه من قبل احدي اطباء عيادتنا بشكل شبه يومي للاطمئنان على صحته نهتم بنظافته و العناية بفرائه : نهتم بتحميمه وتمشيط شعره للتخلص من الشعر المتساقط و لمنع تشابك الشعر وتقليم أظافره توفير كافة التطعيمات التي قد يحتاجها نهتم بتوفير الغذاء الصحي المناسب له و إطعامه في مواعيد محددة بشكل منظم فرصة اللعب مع الحيوانات الأخرى حتى لا يشعر بالاكتئاب الاهتمام براحته النفسية أثناء فترة إقامته معنا
يمكنك الاستعانة بخدمة فندق للكلاب والقطط في حالة ذهابك لرحلات طويلة أو قصيرة يجب عليك اختيار المكان الآمن الذي يحتوي على الخيارات المناسبة لراحة حيوانك للاستمتاع برحلتك دون قلق او توتر وايضا في حالة العمل لفترة طويلة بدون قلق على صديقك الصغير',
            'hosting_type' => $type[array_rand($type)], 
            'short_description' => 'هذا النص يمكن أن يتم تركيبه على أي تصميم',
            'affiliation_link' => 'https://google.com',
        ];
    }

    public function withMedia(): Factory
    {
        return $this->afterCreating(function (Hosting $hosting) {
            $sourcePath2 = public_path('frontend/assets/images/host_banner.jpg');
            if(file_exists($sourcePath2)){
                $destinationPath2 = public_path('frontend/assets/images/host_banner_temp.jpg');
                copy($sourcePath2, $destinationPath2);
            } 
            if(file_exists($sourcePath2) && file_exists($destinationPath2)){
                $hosting->addMedia($destinationPath2)->toMediaCollection('cover');
            } 

            $sourcePath3 = public_path('frontend/assets/images/host01.jpg');
            if(file_exists($sourcePath3)){
                $destinationPath3 = public_path('frontend/assets/images/host01-temp.jpg');
                copy($sourcePath3, $destinationPath3);
            } 
            if(file_exists($sourcePath3) && file_exists($destinationPath3)){
                $hosting->addMedia($destinationPath3)->toMediaCollection('logo');
            }  
        });
    }
}
