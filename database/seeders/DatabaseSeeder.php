<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Admin;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        Category::factory()->count(35)->create();
        Product::factory()->count(35)->create();
        Admin::factory()->count(1)->create();
        User::factory()->count(30)->create();
        Cart::factory()->count(35)->create();
    }
}