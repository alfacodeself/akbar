<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\FileProdcut;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('app.products.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::select('name', 'slug', 'updated_at')->get();
        return view('app.products.create', compact('categories'));
    }
    public function store(ProductRequest $request)
    {
        $category = Category::where('slug', $request->category)->first();
        if ($category == null) {
            return back()->withErrors(['category' => 'Category not found']);
        }
        try {
            // Create Product
            $thumb = 'product-' . Str::random(10) . '.' . $request->file('thumbnail')->extension();
            $store = $request->file('thumbnail')->storeAs('public/products', $thumb);
            $product = Product::create([
                'category_id' => $category->id,
                'thumbnail' => Storage::url($store),
                'name' => $request->name,
                'slug' => Str::slug($request->name) . '-' . Str::random(10),
                'description' => $request->description,
                'stock' => $request->stock,
            ]);
            // Create Gallery
            foreach ($request->galleries as $gallery) {
                $gal = 'gallery-' . Str::random(10) . '.' . $gallery->extension();
                $storeGall = $gallery->storeAs('public/galleries', $gal);
                FileProdcut::create([
                    'product_id' => $product->id,
                    'image' => Storage::url($storeGall)
                ]);
            }
            return redirect()->route('products.index')->with('success', 'Success create product');
        } catch (\Throwable $th) {
            return redirect()->route('products.index')->with('error', $th->getMessage());
        }
    }
    public function edit(Product $product)
    {
        $product = $product->load('category', 'file_products');
        $categories = Category::select('name', 'slug', 'updated_at')->get();
        return view('app.products.edit', compact('categories', 'product'));
    }
    public function update(ProductRequest $request, Product $product)
    {
        $category = Category::where('slug', $request->category)->first();
        if ($category == null) {
            return back()->withErrors(['category' => 'Category not found']);
        }
        try {
            if ($request->hasFile('thumbnail')) {
                if ($product->thumbnail != null) @unlink(public_path($product->thumbnail));
                $thumb = 'product-' . Str::random(10) . '.' . $request->file('thumbnail')->extension();
                $store = $request->file('thumbnail')->storeAs('public/products', $thumb);
                $path = Storage::url($store);
            }else {
                $path = $product->thumbnail;
            }
            $product->updateOrFail([
                'category_id' => $category->id,
                'thumbnail' => $path,
                'name' => $request->name,
                'slug' => Str::slug($request->name) . '-' . Str::random(10),
                'description' => $request->description,
                'stock' => $request->stock,
            ]);
            if ($request->has('galleries')) {
                foreach ($product->file_products as $gallery) {
                    @unlink(public_path($gallery->image));
                }
                foreach ($request->galleries as $gallery) {
                    $gal = 'gallery-' . Str::random(10) . '.' . $gallery->extension();
                    $storeGall = $gallery->storeAs('public/galleries', $gal);
                    FileProdcut::create([
                        'product_id' => $product->id,
                        'image' => Storage::url($storeGall)
                    ]);
                }
            }
            return redirect()->route('products.index')->with('success', 'Success update product');
        } catch (\Throwable $th) {
            return redirect()->route('products.index')->with('error', $th->getMessage());
        }
    }
    public function show(Product $product)
    {
        $galleries = $product->file_products;
        return view('app.products.show', compact('galleries'));
    }
    public function destroy(Product $product)
    {
        try {
            foreach ($product->file_products as $gallery) {
                @unlink(public_path($gallery->image));
                $gallery->delete();
            }
            @unlink(public_path($product->thumbnail));
            $product->delete();
            return redirect()->route('products.index')->with('success', 'Success delete product');
        } catch (\Throwable $th) {
            return redirect()->route('products.index')->with('error', $th->getMessage());
        }
    }
}
