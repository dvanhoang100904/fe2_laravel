<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource. Hiển thị danh sách sản phẩm
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'description' => 'required',
            'photo' => 'required',
            'categories' => 'required',
        ], [
            'name.required' => 'Phải nhập tên sản phẩm',
            'name.max' => 'Tên quá dài',
            'price.required' => 'Phải nhập giá',
            'description.required' => 'Phải nhập mô tả',
            'photo.required' => 'Phải nhập hình',
            'categories.required' => 'Phải chọn danh mục',
        ]);


        Product::create($validated)->categories()->attach($validated['categories']);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('products.edit', ['categories' => $categories, 'product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'description' => 'required',
            'photo' => 'required',
            'categories' => 'required',
        ], [
            'name.required' => 'Phải nhập tên sản phẩm',
            'name.max' => 'Tên quá dài',
            'price.required' => 'Phải nhập giá',
            'description.required' => 'Phải nhập mô tả',
            'photo.required' => 'Phải nhập hình',
            'categories.required' => 'Phải chọn danh mục',
        ]);

        $product = Product::find($id);
        $product->update($validated);
        $product->categories()->sync($validated['categories']);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index');
    }

    function search(Request $request)
    {
        $keyword = $request->q;
        $products = Product::where('name', 'LIKE', "%$keyword%")->get();

        return view('products.search', ['products' => $products]);
    }

    public function bin()
    {
        $products = Product::onlyTrashed()->get();
        return view('products.bin', ['products' => $products]);
    }

    public function restore(string $id)
    {
        $products = Product::onlyTrashed()->find($id)->restore();
        return redirect()->route('products.index');
    }

    public function forceDelete(string $id)
    {
        $product = Product::onlyTrashed()->find($id);
        $product->categories()->detach();
        $product->forceDelete();
        return redirect()->route('products.index');
    }

    public function empty()
    {
        $products = Product::onlyTrashed()->get();
        foreach ($products as $product) {
            $product->categories()->detach();
            $product->forceDelete();
        }
        return redirect()->route('products.index');
    }

    public function productsAllAPI()
    {
        $products = Product::with('categories')->get();
        return $products;
    }

    public function searchAPI(string $keyword)
    {
        $products = Product::where('name', 'LIKE', "%$keyword%")->get();

        return $products;
    }
}
