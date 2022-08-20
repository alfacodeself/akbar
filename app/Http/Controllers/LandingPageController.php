<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::withCount('products')->get();
        $products = Product::query();
        if ($request->has('category')) {
            $products = $products->join('categories', 'products.category_id', '=', 'categories.id')
                        ->select('products.*', 'categories.name AS category_name')
                        ->where('categories.name', $request->category);
        }
        elseif ($request->has('stock')) {
            if ($request->stock == 'empty') {
                $products = $products->where('stock', 0);
            }elseif ($request->stock == 'ready') {
                $products = $products->where('stock', '>', 0);
            }elseif ($request->stock == 'ready' && $request->stock == 'ready') {
                $products = $products;
            }
        }
        $products = $products->paginate($request->paginate ?? 3);
        $setting = Setting::first();
        return view('welcome', compact('categories', 'products', 'setting'));
    }
    public function show(Product $product)
    {
        $setting = Setting::first();
        $galleries = $product->file_products;
        return view('gallery', compact('galleries', 'setting'));
    }
}
