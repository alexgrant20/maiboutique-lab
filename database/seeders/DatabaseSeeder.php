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
        'name' => 'Baju Snoopie Putih',
        'price' => 200000,
        'image' => '/storage/product/product-1.jpg',
        'description' => 'Baju snoopie yang cantik khusus untuk ukuran M',
        'created_at' => $now,
        'updated_at' => $now,
      ],
      [
        'name' => 'Hoodie Adventure Time',
        'price' => 320000,
        'image' => '/storage/product/product-2.jpeg',
        'description' => 'Hoodie adventure time khusus untuk ukuran M',
        'created_at' => $now,
        'updated_at' => $now,
      ],
      [
        'name' => 'Baju JAKE Adventure Time',
        'price' => 320000,
        'image' => '/storage/product/product-3.jpeg',
        'description' => 'Baju jake di adventure time khusus untuk ukuran M',
        'created_at' => $now,
        'updated_at' => $now,
      ],
      [
        'name' => 'Baju JAKE Adventure Time',
        'price' => 120000,
        'image' => '/storage/product/product-4.jpeg',
        'description' => 'Baju muka jake di adventure time khusus untuk ukuran M',
        'created_at' => $now,
        'updated_at' => $now,
      ],
      [
        'name' => 'Baju Snoopy Atap',
        'price' => 80000,
        'image' => '/storage/product/product-5.jpg',
        'description' => 'Baju snoopy di atap khusus untuk ukuran XL',
        'created_at' => $now,
        'updated_at' => $now,
      ],
      [
        'name' => 'Baju Snoopy Pink Cantik',
        'price' => 670000,
        'image' => '/storage/product/product-6.jpg',
        'description' => 'Baju snoopy dipeluk shaggy khusus untuk ukuran XL',
        'created_at' => $now,
        'updated_at' => $now,
      ],
      [
        'name' => 'Baju Snoopy bersama si burung kuning',
        'price' => 50000,
        'image' => '/storage/product/product-7.jpg',
        'description' => 'Baju snoop dengan burung kuning untuk ukuran XL',
        'created_at' => $now,
        'updated_at' => $now,
      ],
      [
        'name' => 'Baju Snoopy Koboi',
        'price' => 960000,
        'image' => '/storage/product/product-8.jpeg',
        'description' => 'Baju snoopy langka dengan topi khusus untuk ukuran XL',
        'created_at' => $now,
        'updated_at' => $now,
      ],
      [
        'name' => 'Baju Snoopy Sexophone',
        'price' => 130000,
        'image' => '/storage/product/product-9.jpg',
        'description' => 'Baju snoopy bermain terompet atap khusus untuk ukuran XL',
        'created_at' => $now,
        'updated_at' => $now,
      ],
    ]);

    TransactionHeader::insert([
      [
        'user_id' => 1,
        'total_item' => 3,
        'total_price' => 10000,
      ],
      [
        'user_id' => 1,
        'total_item' => 5,
        'total_price' => 25000,
      ],
      [
        'user_id' => 1,
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
        'transaction_header_id' => 3,
        'product_id' => 2,
        'quantity' => 1,
        'price' => 10000
      ],
      [
        'transaction_header_id' => 3,
        'product_id' => 1,
        'quantity' => 1,
        'price' => 5000
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
