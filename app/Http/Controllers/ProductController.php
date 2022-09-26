<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Inventory;
use App\Models\Order_details;
use App\Models\Order_summery;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\Size;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use PhpParser\Node\Stmt\Return_;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index', [
            'products' => Product::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create', [
            'categories' => Category::all(),
            'subcaregories' => Subcategory::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = Str::slug($request->product_name) . "-" . Str::random(5);
        $sku = strtolower(Str::substr($request->product_name, 0, 3) . "-" . rand());
        $product_id = Product::insertGetId($request->except('_token') + [
            'slug' => $slug,
            'product_sku' => $sku,
            'created_at' => Carbon::now()
        ]);

        if ($request->hasFile('product_thumbnail_photo')) {
            // Image upload start
            $image_name = $product_id . "." . $request->file('product_thumbnail_photo')->getClientOriginalExtension();
            Image::make($request->file('product_thumbnail_photo'))->resize(270, 310)->save(base_path('public/uploads/product_thumbnail_photo/' . $image_name));
            // Image upload end
            Product::find($product_id)->update([
                'product_thumbnail_photo' => $image_name
            ]);
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function getsubcategory(Request $request)
    {
        foreach (Subcategory::where('category_id', $request->category_id)->get() as $subcategory) {
            echo "<option value='$subcategory->id'>$subcategory->subcategory_name</option>";
        };
    }

    public function addproductinventory(Request $request, $product_id)
    {
        $product = Product::find($product_id);
        $colors = Color::all();
        $sizes = Size::all();
        $inventories = Inventory::where('product_id', $product_id)->get();
        return view('product.inventory', compact('product', 'sizes', 'colors', 'inventories'));
    }

    public function addproductinventorypost(Request $request, $product_id)
    {
        $exists_check = Inventory::where([
            'product_id' => $product_id,
            'color_id' => $request->color_id,
            'size_id' => $request->size_id,
        ])->exists();

        if ($exists_check == 1) {
            Inventory::where([
                'product_id' => $product_id,
                'color_id' => $request->color_id,
                'size_id' => $request->size_id,
            ])->increment('quantity', $request->quantity);
        } else {
            Inventory::insert($request->except('_token') + [
                'product_id' => $product_id,
                'created_at' => Carbon::now()
            ]);
        }
        return back()->with('success', 'Inventory Added Successfully');
    }

    public function color()
    {
        $colors = Color::all();
        return view('product.color', compact('colors'));
    }

    public function colorstore(Request $request)
    {

        Color::insert($request->except('_token') + [
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Color Added Successfully');
    }

    public function size()
    {
        $sizes = Size::all();
        return view('product.size', compact('sizes'));
    }

    public function sizestore(Request $request)
    {

        Size::insert($request->except('_token') + [
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Size Added Successfully');
    }

    public function getcity(Request $request)
    {
        $srt_to_send = "<option>-Select City-</option>";
        $cities =  Shipping::where('country_id', $request->country_id)->get();
        foreach ($cities as $city) {
            $srt_to_send .= "<option value='$city->shipping_charge'>$city->city_name</option>";
        }
        echo $srt_to_send;
    }

    public function orderInfo()
    {
        $order_summeries = Order_summery::latest()->get();
        return view('dashboard.order.index', compact('order_summeries'));
    }

    public function orderDetals(Order_summery $order)
    {
        return view("dashboard.order.detals", compact('order'));
    }
}
