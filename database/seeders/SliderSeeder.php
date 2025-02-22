<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slider = Slider::create([
            'title' => 'PETS HUP',
            'sub_title' => 'دلل حيوانك الأليف بيوم تنظيف مريح في منزله',
            'publish' => 1,
        ]);
        
        $sourcePath = public_path('frontend/assets/images/slider/sliderr-1-bg.png');
        if(file_exists($sourcePath)){
            $destinationPath = public_path('frontend/assets/images/slider/sliderr-1-bg-temp.png');
            copy($sourcePath, $destinationPath);
        } 
        if(file_exists($sourcePath) && file_exists($destinationPath)){
            $slider->addMedia($destinationPath)->toMediaCollection('image');
        }

        $slider = Slider::create([
            'title' => '',
            'sub_title' => 'عيادة منزلية كاملة لحيوانك الأليف',
            'publish' => 1,
        ]);
        
        $sourcePath = public_path('frontend/assets/images/slider/sliderr-2-bg.png');
        if(file_exists($sourcePath)){
            $destinationPath = public_path('frontend/assets/images/slider/sliderr-2-bg-temp.png');
            copy($sourcePath, $destinationPath);
        } 
        if(file_exists($sourcePath) && file_exists($destinationPath)){
            $slider->addMedia($destinationPath)->toMediaCollection('image');
        }

        $slider = Slider::create([
            'title' => '',
            'sub_title' => 'أطباء معتمدين في خدمتك',
            'publish' => 1,
        ]);
        
        $sourcePath = public_path('frontend/assets/images/slider/sliderr-3-bg.png');
        if(file_exists($sourcePath)){
            $destinationPath = public_path('frontend/assets/images/slider/sliderr-3-bg-temp.png');
            copy($sourcePath, $destinationPath);
        } 
        if(file_exists($sourcePath) && file_exists($destinationPath)){
            $slider->addMedia($destinationPath)->toMediaCollection('image');
        }
    }
}
