<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $products = Product::factory(50)->create();

        $users = User::factory(20)->create();

        $orders = Order::factory(10)
                    ->make()
                    ->each(function ($order) use($users) {
                        $order->customer_id = $users->random()->id;
                        $order->save();

                        $payment = Payment::factory()->make();

                        $payment->order_id = $order->id;
                        $payment->save();

                        // in above can simplify with this
                        // tapi kok gabisa asw, kebaca sama laravel jadi orders_id bukan order_id
                        // $order->payment()->save($payment);
                    });
    }
}
