<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Order_summery;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\Subcategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (session('previous_page')) {
            return redirect(session('previous_page'));
        }
        $total_users = User::count();
        $toatl_subcategory = Subcategory::count();
        $toatl_category = Category::count();
        $toatl_product = Product::count();
        return view('home', compact('total_users', 'toatl_subcategory', 'toatl_category', 'toatl_product'));
    }
    public function profile()
    {
        return view('profile.index');
    }
    public function cahage_name(Request $request)
    {

        User::find(auth()->id())->update([
            'name' => $request->change_name,
            'phone_number' => $request->phone_number,
        ]);
        if ($request->hasFile('profile_photo')) {
            // Image upload start
            $image_name = auth()->id() . "." . $request->file('profile_photo')->getClientOriginalExtension();
            Image::make($request->file('profile_photo'))->resize(196, 196)->save(base_path('public/uploads/profile_photo/' . $image_name));
            // Image upload end
            User::find(auth()->id())->update([
                'portfolio_photo' => $image_name
            ]);
        }
        return back()->with('success', 'Profile Chnages successfully!');
    }
    public function change_password(Request $request)
    {
        if (Hash::check($request->current_password, auth()->user()->password)) {
            if ($request->password == $request->confirm_password) {
                User::find(auth()->id())->update([
                    'password' => $request->password,
                ]);
                return back()->with('success', 'Password Chnages successfully!');
            } else {
                return back()->with('error', 'Your New Password doesnot match with Confirm password');
            }
        } else {
            return back()->with('error', 'Your current password doesnot match with our record');
        }
    }

    public function shipping()
    {
        $countries = Country::all();
        $shppings = Shipping::all();
        return view('backend.shipping', compact('countries', 'shppings'));
    }

    public function shippinginsert(Request $request)
    {
        Shipping::insert($request->except('_token'), [
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Shipping Added Successfully');
    }

    public function delevary_status_update(Order_summery $order_id, $delevary_status)
    {
        $order_id->delivary_status = $delevary_status;
        if ($delevary_status == 'delivered') {
            $order_id->payment_status = 'paid';
        } else {
            $order_id->payment_status = 'pending';
        }
        $order_id->save();
        return back();
    }
}
