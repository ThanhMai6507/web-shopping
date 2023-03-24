<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Attachment;
use App\Models\Category;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\ProductUser;
use App\Models\Size;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        Attachment::factory()->count(10)->create();
        Category::factory()->count(10)->create();
        Color::factory()->count(10)->create();
        ColorProduct::factory()->count(10)->create();
        Product::factory()->count(10)->create();
        ProductSize::factory()->count(10)->create();
        ProductUser::factory()->count(10)->create();
        Size::factory()->count(10)->create();
        User::factory()->count(10)->create();
    }
}
