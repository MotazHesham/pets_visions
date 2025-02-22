<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str; 

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::where('user_type','store')->get()->pluck('id')->toArray(); 
        $stores = Store::pluck('id')->toArray();
        $categories = ProductCategory::pluck('id')->toArray();
        return [
            'category_id' => $categories[array_rand($categories,1)],
            'name' => 'بي ديجري - فيتل طعام جاف للكلاب (اعمار صغيرة)',
            'description' => 'بالنكهات الشهية لحم البقر والغنم، الخضروات، الديك الرومي، سمك السالمون وسمك المحيط. المزيج المثالي الذي يربطك بكلبك من خلال وجبة صحية!',
            'details' => 'المكونات : الذرة الكاملة، وجبة فول الصويا، وجبة دجاج ثانوية، وجبة غلوتين الذرة، لحم الضأن (المحفوظ مع خليط توكوفيرولس) ، حصيلة هضم الحيوان، وجبنة الديك الرومي، وجبة سمك السلمون، وجبة أسماك المحيط، حامض الفوسفوريك، كربونات الكالسيوم، ليسين مونوهيدروكلوريد، كلوريد الكولين والملح وثاني أكسيد التيتانيوم (اللون)، فيتامينات (مكملات فيتامين هـ، النياسين، فيتامين أ ملحق، أحاديات الثيامين، ملحق ريبوفلافين، د-الكالسيوم البانتوثين، بيريدوكسين هيدروكلوريد، فيتامين ب 12 التكميلي، مينديوني ثنائي كبريتات الصوديوم (المصدر من نشاط فيتامين ك)، مكملات فيتامين د 3، حمض الفوليك، البيوتين) ، المعادن (كبريتات الحديدوز، أكسيد الزنك، أكسيد المنغنيز، كبريتات النحاس، يودات الكالسيوم، سيلينيوم الصوديوم)، التورين، دي إل ميثيونين، أصفر 6، أصفر 5، اللاكتيك، أحمر 40، كلوريد البوتاسيوم، أزرق 2، مستخلص روزماري.', 
            'added_by' => 'admin',
            'slug' => Str::random(7), 
            'published' => 1,
            'featured' => 1,
            'price' => 150,
            'current_stock' => 50,
            'affiliation_link' => 'https://google.com',
            'user_id' => $users[array_rand($users,1)],
            'store_id' => $stores[array_rand($stores,1)],
            'rating' => rand(0,5) 
        ];
    }
    public function withMedia(): Factory
    {
        return $this->afterCreating(function (Product $product) {
            $sourcePath = public_path('frontend/assets/images/product01.png');
            if (file_exists($sourcePath)) {
                $destinationPath = public_path('frontend/assets/images/product01-temp.png');
                copy($sourcePath, $destinationPath);
                $product->addMedia($destinationPath)->toMediaCollection('main_photo'); 
            }

            $sourcePath = public_path('frontend/assets/images/product_main_01.jpg');
            if (file_exists($sourcePath)) {
                $destinationPath = public_path('frontend/assets/images/product_main_01-temp.jpg');
                copy($sourcePath, $destinationPath);
                $product->addMedia($destinationPath)->toMediaCollection('photos');
            }
        });
    }
}
