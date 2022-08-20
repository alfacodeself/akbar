<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->get();
        return view('app.categories.index', compact('categories'));
    }
    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required'
        ]);
        try {
            $valid['slug'] = Str::slug($valid['name']) . '-' . Str::random(5);
            Category::create($valid);
            return redirect()->route('categories.index')->with('success', 'Success add new category');
        } catch (\Throwable $th) {
            return redirect()->route('categories.index')->with('error', $th->getMessage());
        }
    }
    public function update(Category $category, Request $request)
    {
        $valid = $request->validate([
            'name' => 'required'
        ]);
        try {
            $valid['slug'] = Str::slug($valid['name']) . '-' . Str::random(5);
            $category->update($valid);
            return redirect()->route('categories.index')->with('success', 'Success update category');
        } catch (\Throwable $th) {
            return redirect()->route('categories.index')->with('error', $th->getMessage());
        }
    }
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('categories.index')->with('success', 'Success delete category');
        } catch (\Throwable $th) {
            return redirect()->route('categories.index')->with('error', $th->getMessage());
        }
    }
}
