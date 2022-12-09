<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Product;
use App\Models\Role;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {

        $now = now();

        Role::insert([
            ['name' => 'admin', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'member', 'created_at' => $now, 'updated_at' => $now]
        ]);

        User::insert([
            [
                'role_id' => 2,
                'username' => 'user123',
                'email' => 'user@gmail.com',
                'password' => '$2y$10$HN9PkqbEMModR5MRshroX.nXgQXbbIZhISTZz4zrYwcQlb1.3aqW.', //password
                'phone_number' => '123456789012',
                'address' => '123457',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'role_id' => 1,
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$HN9PkqbEMModR5MRshroX.nXgQXbbIZhISTZz4zrYwcQlb1.3aqW.', //password
                'phone_number' => '1234567890',
                'address' => '123457',
                'created_at' => $now,
                'updated_at' => $now
            ]

        ]);

        Product::insert([
            [
                'name' => 'baju pria biru',
                'price' => 20000,
                'image' => 'https://picsum.photos/seed/avc/200/300',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam laudantium eius magni ea vitae iste eveniet doloribus! Voluptatum, provident nam.',
                'stock' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'baju wanita merah',
                'price' => 35000,
                'image' => 'https://picsum.photos/seed/ccas/200/300',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam laudantium eius magni ea vitae iste eveniet doloribus! Voluptatum, provident nam.',
                'stock' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'baju anak biru',
                'price' => 405000,
                'image' => 'https://picsum.photos/seed/sdfn/200/300',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam laudantium eius magni ea vitae iste eveniet doloribus! Voluptatum, provident nam.',
                'stock' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'baju anak merah',
                'price' => 202000,
                'image' => 'https://picsum.photos/seed/sbyer/200/300',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam laudantium eius magni ea vitae iste eveniet doloribus! Voluptatum, provident nam.',
                'stock' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);

        TransactionHeader::insert([
            [
                'user_id' => 2,
                'total_item' => 3,
                'total_price' => 10000,
            ],
            [
                'user_id' => 2,
                'total_item' => 5,
                'total_price' => 20000,
            ],
            [
                'user_id' => 2,
                'total_item' => 5,
                'total_price' => 15000,
            ],
        ]);

        TransactionDetail::insert([
            [
                'transaction_header_id' => 1,
                'product_id' => 1,
                'quantity' => 2,
                'price' => 3000
            ],
            [
                'transaction_header_id' => 1,
                'product_id' => 2,
                'quantity' => 1,
                'price' => 4000
            ],
            [
                'transaction_header_id' => 2,
                'product_id' => 4,
                'quantity' => 2,
                'price' => 5000
            ],
            [
                'transaction_header_id' => 2,
                'product_id' => 2,
                'quantity' => 1,
                'price' => 10000
            ],
            [
                'transaction_header_id' => 2,
                'product_id' => 3,
                'quantity' => 2,
                'price' => 2500
            ],
            [
                'transaction_header_id' => 1,
                'product_id' => 2,
                'quantity' => 1,
                'price' => 10000
            ],
        ]);

        Cart::create([
            'user_id' => 1
        ]);

        CartDetail::create([
            'cart_id' => 1,
            'product_id' => 2,
            'quantity' => 3
        ]);
    }
}
