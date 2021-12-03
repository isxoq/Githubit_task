<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transactions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = Client::all();

        foreach ($clients as $client) {

            foreach (range(1, rand(1, 4)) as $id) {
                $order = new Order([
                    'client_id' => $client->id,
                    'amount' => rand(200, 20000),
                    'status' => rand(0, 1),
                ]);
                $order->save();

                $products = Product::all()->random(rand(1, 3));

                foreach ($products as $product) {
                    $transaction = new Transactions([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'quantity' => rand(1, 2),
                        'price' => $product->price,
                    ]);
                    $transaction->save();
                }
            }

        }
    }
}
