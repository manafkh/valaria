<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();

        foreach ($categories as $category) {
            if ($category->parent_id == null || $category->parent_id == 2){
                $category->update([
                    'image_icon'=> "images/interior/".$category->name . ".png"
                ]);
            }

            if ($category->parent_id == 3 || $category->parent_id == 8 || $category->parent_id == 13 || $category->parent_id == 17
                || $category->parent_id == 23 || $category->parent_id == 28 || $category->parent_id == 31){
                $category->update([
                    'image'=> "images/interior/".$category->name .".jpg",
                    'image_opacity'=> "images/interior/".$category->name ."-opacity.jpg"
                ]);
            }
            if ($category->parent_id == 41) {
                $category->update([
                    'image_icon' => "images/architecture/" . $category->name . ".png"
                ]);
            }
            if ($category->parent_id == 70 || $category->parent_id == 67 || $category->parent_id == 52 || $category->parent_id == 47
                || $category->parent_id == 76 || $category->parent_id == 62 || $category->parent_id == 56 || $category->parent_id == 56 || $category->parent_id == 42) {
                $category->update([
                    'image' => "images/architecture/" . $category->name . ".jpg",
                    'image_opacity' => "images/architecture/" . $category->name . "-opacity.jpg"
                ]);
            }

            if ($category->parent_id == 83) {
                $category->update([
                    'image' => "images/landscape/" . $category->name . ".jpg",
                    'image_opacity' => "images/landscape/" . $category->name . "-opacity.jpg"
                ]);
            }


        }
    }

}
