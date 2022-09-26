<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Channel;
use App\Models\Coupon;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class FontendController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::latest()->take(8)->get();
        $total_product = Product::count();
        return view('frontend.index', compact('categories', 'products', 'total_product'));
    }

    public function shop()
    {
        if (isset($_GET['search'])) {
            $products = Product::where('product_name', 'LIKE', '%' . $_GET['search'] . '%')
                ->orwhere('product_long_description', 'LIKE', '%' . $_GET['search'] . '%')->get();
        } else {
            $products = Product::latest()->get();
        }

        if (isset($_GET['min']) && (isset($_GET['max']))) {
            $query1 = Product::whereBetween('product_discounted_price', [$_GET['min'], $_GET['max']])->get();
            $query2 = Product::whereNull('product_discounted_price')->whereBetween('product_regular_price', [$_GET['min'], $_GET['max']])->get();
            $products = $query1->merge($query2);
        }
        $total_product = Product::count();
        $categories = Category::all();
        return view('frontend.shop', compact('products', 'total_product', 'categories'));
    }

    public function categorydetails($slug)
    {
        $category_detals = Category::where('slug', $slug)->first()->id;
        $subcategory_detals = Subcategory::where('category_id', Category::where('slug', $slug)->first()->id)->get();
        return view('frontend.categorydetails', compact('category_detals', 'subcategory_detals'));
    }
    public function productdetails($slug)
    {

        session()->forget('previous_page');
        $product_detals = Product::where('slug', $slug)->first();
        $related_products = Product::where('category_id', $product_detals->category_id)->where('id', '!=', $product_detals->id)->get();

        $colors = Inventory::where('product_id', $product_detals->id)->groupBy('color_id')->select('color_id')->get();
        return view('frontend.productdetails', compact('product_detals', 'related_products', 'colors'));
    }

    public function getsize(Request $request)
    {
        $strtosend = " <option value=''>Select Size</option>";
        $sizes = Inventory::where([
            'product_id' => $request->product_id,
            'color_id' => $request->color_id
        ])->get();

        // foreach ($sizes as $size) {
        //     $strtosend .= "<li><a id='" . $size->relationwithsize->id . "' class='ami'>" . $size->relationwithsize->size_name . "</a></li>";
        // }
        foreach ($sizes as $size) {
            $strtosend .= "<option value='" . $size->relationwithsize->id . "'>" . $size->relationwithsize->size_name . "</option>";
        }
        echo $strtosend;
    }

    public function stock(Request $request)
    {
        echo   Inventory::where([
            'product_id' => $request->product_id,
            'color_id' => $request->color_id,
            'size_id' => $request->size_id,

        ])->first()->quantity;
    }

    public function addtocart(Request $request)
    {
        $check_amount =  Cart::where([
            'product_id' => $request->product_id,
            'color_id' => $request->color_id,
            'size_id' => $request->size_id,
            'user_id' => $request->user_id,
        ])->exists();

        if ($check_amount) {
            Cart::where([
                'product_id' => $request->product_id,
                'color_id' => $request->color_id,
                'size_id' => $request->size_id,
                'user_id' => $request->user_id,
            ])->increment('user_input_amout', $request->user_input_amout);
        } else {
            Cart::insert([
                'product_id' => $request->product_id,
                'color_id' => $request->color_id,
                'size_id' => $request->size_id,
                'user_input_amout' => $request->user_input_amout,
                'user_id' => $request->user_id,
                'created_at' => Carbon::now()
            ]);
        }
        echo "Done";
    }

    public function checkcoupon(Request $request)
    {

        $exists_check = Coupon::whereRaw("BINARY `coupon_name`= ?", [$request->coupon_name])->exists();
        if ($exists_check) {
            $coupon = Coupon::whereRaw("BINARY `coupon_name`= ?", [$request->coupon_name])->first();
            if ($coupon->coupon_limit == 0) {
                return response()->json(['error' => 'This Coupon Has no Limit']);
            } else {
                if ($coupon->coupon_validity < Carbon::today()) {
                    return response()->json(['error' => 'This Coupon has No Validity']);
                } else {
                    if ($coupon->coupon_type == 1) {
                        $discount_amount =  ($request->total_amount / 100) * $coupon->coupon_amount;
                        return response()->json(['good' => round($discount_amount)]);
                    } else {
                        if ($request->total_amount < $coupon->coupon_amount) {
                            return response()->json(['error' => 'Discount Cannot be more than Toatal amount, Please shoping More!!!']);
                        } else {
                            $discount_amount = $coupon->coupon_amount;
                            return response()->json(['good' => $discount_amount]);
                        }
                    }
                }
            }
        } else {
            return response()->json(['error' => 'This Coupon doesnot match with our record']);
        }
    }

    public function checkoutredirect(Request $request)
    {
        Session::put('s_total_amount', $request->total_amount);
        Session::put('s_coupon_amount', $request->coupon_amount);
        Session::put('s_shipping_charge', $request->shipping_charge);
        Session::put('s_grand_total', $request->grand_total);
        Session::put('s_country_id', $request->country_id);
        Session::put('s_city_name', $request->city_name);
        Session::put('s_coupon_name', $request->coupon_input);
    }

    // public function media_center()
    // {
    //     $title = "Media Center";
    //     $list = Channel::latest()->get();
    //     $delete_cannels =  Channel::onlyTrashed()->latest()->get();
    //     return view('media-center', compact('list', 'title', 'delete_cannels'));
    // }
    // public function contact()
    // {
    //     $title = 'Contact Us';
    //     $name = "Get in Touch";
    //     return view('contact', compact('name', 'title'));
    // }
    // public function about_us()
    // {
    //     $title = 'About Us';
    //     $name = "Hi Abid";
    //     $para = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore quas unde esse quia sapiente odit ipsam facilis qui quibusdam reiciendis ipsa, labore ipsum aspernatur, eaque excepturi voluptate vel. Error, dolore.";
    //     return view('about-us', compact('name', 'para', 'title'));
    // }
    // public function media_center_insert(Request $request)
    // {
    //     $request->validate([
    //         'channel_name' => 'required|alpha|max:10'
    //     ], [
    //         'channel_name.required' => "Channel Name is Missing"
    //     ]);
    //     Channel::insert([
    //         'channel_name' => $request->channel_name,
    //         'created_at' =>  Carbon::now()
    //     ]);
    //     return back()->with('insert-success', 'Channel Name Added successfully');
    // }

    // public function channel_delete($channel_id)
    // {
    //     Channel::find($channel_id)->delete();
    //     return back()->with('channel-delete', 'Channel delete successfully');
    // }
    // // public function channel_delete_soft()
    // // {
    // //     return Channel::softDeleted('id');
    // //     return back();
    // // }
    // public function channel_edit($channel_id)
    // {
    //     $title = 'Channel Edit';
    //     $channel_info = Channel::find($channel_id);
    //     return view('channel-edit', compact('channel_info', 'title'));
    // }
    // public function channel_update(Request $request, $channel_id)
    // {
    //     $old_name = Channel::find($channel_id)->channel_name;
    //     Channel::find($channel_id)->update([
    //         'channel_name' => $request->channel_name
    //     ]);
    //     return redirect('media-center')->with('update_success', $old_name . 'Channel Updated To ' . $request->channel_name);
    // }
    // public function channel_restore($channel_id)
    // {
    //     Channel::onlyTrashed()->find($channel_id)->restore();
    //     return back();
    // }
    // public function channel_delete_forever($channel_id)
    // {
    //     Channel::onlyTrashed()->find($channel_id)->forceDelete();
    //     return back();
    // }
    // public function channel_delete_forever_all()
    // {
    //     Channel::onlyTrashed()->forceDelete();
    //     return back();
    // }
}
