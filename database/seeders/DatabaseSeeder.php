<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Admin;
use App\Models\Sale;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {

        Admin::updateOrCreate(
        [
            'id' => 1,
        ],
        [
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);    

        User::updateOrCreate(
        [
            'id' => 1,
        ],
        [
            'id' => 1,
            'name' => 'Goku',
            'email' => 'goku@user.com',
            'password' => Hash::make('123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);    

        $categories = [
            ['name' => 'Eletrônicos'],
            ['name' => 'Roupas'],
            ['name' => 'Acessórios'],
            ['name' => 'Alimentos'],
            ['name' => 'Casa e Jardim'],
        ];

        foreach ($categories as $category) {
            Category::updateOrInsert($category);
        }

        $products = [
            [
                'name' => 'Smartphone',
                'description' => 'Um smartphone de última geração.',
                'price' => 999.99,
                'category_id' => 1,
                'quantity' => 10,
                'main_image' => 'smartphone.jpg',
            ],
            [
                'name' => 'Camiseta',
                'description' => 'Uma camiseta confortável e estilosa.',
                'price' => 29.99,
                'category_id' => 2,
                'quantity' => 20,
                'main_image' => 'camiseta.jpg',
            ],
        ];

        // Adicionar os produtos ao banco de dados
        foreach ($products as $product) {
            Product::updateOrInsert($product);
        }

        Sale::updateOrCreate(
            [
                'id' => 1,
            ],
            [
                'id' => 1,
                'user_id' => 1,
                'product_id' => 1,
                'quantity' => 1,
                'total' => 999.99,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
