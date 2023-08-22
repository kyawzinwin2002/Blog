<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ["Local News","Global News","Sport","Food","Travel"];
        $arr = [];
        // foreach($categories as $category){
        //     Category::factory()->create([
        //         "title" => $category,
        //         "user_id" => rand(1,11)
        //     ]);
        // }

        foreach($categories as $category){
            $arr[] = [
                "title" => $category,
                // "user_id" => User::where("role","admin")->random()->id,
                "slug" => Str::slug($category),
                "user_id" => 1,
                "updated_at" => now(),
                "created_at" => now()
            ];
        }

        Category::insert($arr);
    }
}
