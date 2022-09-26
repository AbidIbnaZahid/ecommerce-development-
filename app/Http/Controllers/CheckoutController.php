<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Country;
use App\Models\Inventory;
use App\Models\Order_details;
use App\Models\Order_summery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function checkout()
    {
        if (session('s_total_amount')) {
            return view('frontend.checkout');
        } else {
            return redirect('shop');
        }
    }

    public function checkoutpost(Request $request)
    {
        // step:1 = Insert into Order summary table
        $oreder_summary_id = Order_summery::insertGetId([
            'user_id' => auth()->id(),
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'custome_phone_number' => $request->custome_phone_number,
            'customer_country' => Country::find(session('s_country_id'))->name,
            'customer_city' => session('s_city_name'),
            'customer_address' => $request->customer_address,
            'customer_notes' => $request->customer_notes,
            'total_amount' => session('s_total_amount'),
            'discount_amount' => session('s_coupon_amount'),
            'shipping_charge' => session('s_shipping_charge'),
            'grand_total' => session('s_grand_total'),
            'coupon_name' => session('s_coupon_name'),
            'payment_method' => $request->payment_method,
            'payment_status' => 'pending',
            'created_at' => Carbon::now(),
        ]);
        // step: 2 Insert all product under order

        foreach (Cart::where('user_id', auth()->id())->get() as $cart) {
            Order_details::insert([
                'oreder_summary_id' => $oreder_summary_id,
                'product_id' => $cart->product_id,
                'color_id' => $cart->color_id,
                'size_id' => $cart->size_id,
                'user_input_amout' => $cart->user_input_amout,
                'created_at' => Carbon::now(),
            ]);

            // step3: Minas form Inventory
            Inventory::where([
                'product_id' => $cart->product_id,
                'color_id' => $cart->color_id,
                'size_id' => $cart->size_id
            ])->decrement('quantity', $cart->user_input_amout);

            // step4: Delete Product Form Cart
            $cart->delete();
        }
        Session::forget([
            's_total_amount',
            's_coupon_amount',
            's_shipping_charge',
            's_grand_total',
            's_country_id',
            's_city_name',
            's_coupon_name',
        ]);

        return redirect('shop')->with('success', 'Order Submited successfullly');
    }
}
