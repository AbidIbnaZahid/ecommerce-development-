<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Shipping;
use Illuminate\Http\Request;

class Cartcontroller extends Controller
{
    public function cart()
    {
        $carts = Cart::where('user_id', auth()->id())->get();
        $countries = Shipping::groupBy('country_id')->select('country_id')->get();
        return view('frontend.cart', compact('carts', 'countries'));
    }

    public function cartremove(Cart $cart)
    {
        $cart->delete();
        return back();
    }

    public function clearcart()
    {
        Cart::where('user_id', auth()->id())->delete();
        return back();
    }

    public function updatecart(Request $request)
    {
        foreach ($request->cart_item as $card_id => $user_input_amount) {
            Cart::find($card_id)->update([
                'user_input_amout' => $user_input_amount,
            ]);
        }
        return back();
    }
}
