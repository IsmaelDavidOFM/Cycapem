<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;

use App\Models\Product;
use App\Models\User;
use App\Models\Customer;
use App\Models\Order;
use \App\Models\Categories;
use \App\Models\Supplier;
use Database\Factories\ProductFactory;
use Database\Factories\UserFactory;
use Database\Factories\OrderFactory;
use Database\Factories\OrderDetailFactory;
use Database\Factories\CustomerFactory;
use Database\Factories\SupplierFactory;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Categories::factory(3)->create();
        Supplier::factory(10)->create();
        Product::factory(50)->create();
        Customer::factory(10)->create();

    }
}
