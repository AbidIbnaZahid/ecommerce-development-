<?php

namespace App\Http\Controllers;

use App\Models\Order_summery;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class CustomerController extends Controller
{
    public function customer()
    {
        return view('frontend.customer.login');
    }

    public function customerRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'password' => 'required',
            'password_confirmation' => 'required',
            'captcha' => 'required|captcha',
        ]);
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'customer',
            'created_at' => Carbon::now(),
        ]);
        return back()->with([
            'success' => 'Customer Added Successfully',
            'email' => $request->email,
        ]);
    }

    public function customerdashboard()
    {
        $order_sumaries = Order_summery::where('user_id', auth()->id())->get();
        return view('frontend.customer.dashboard', compact('order_sumaries'));
    }

    public function reloadcaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }

    public function dashboardOrderInvoice(Order_summery $order_summery)
    {
        return view('frontend.customer.invoice', compact('order_summery'));
    }

    public function dashboardOrderInvoiceDownload(Order_summery $order_summery)
    {
        $pdf = PDF::loadView('frontend.customer.invoice', compact('order_summery'));
        return $pdf->stream('Order' . $order_summery->id . '.pdf');
        // return $pdf->download('Order' . $order_summery->id . '.pdf');
    }
}
