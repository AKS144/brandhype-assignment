<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $product = Product::orderBy('id', 'desc')->paginate(3);
        return view('product.index', ['product' => $product]);
    }


    public function create()
    {
        $categories = Category::latest()->get();
        return view('product.create',compact('categories'));
    }


    public function store(Request $request) {

        $request->validate([
            'category_id' => 'required',
            'name' => 'required|min:2|max:200',
            'email' => 'required|email',
            'stock_count' => 'required|min:1|max:50',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $image);

        $product = [
            'name' => $request->name,
            'category_id' => $request->category_id,
            'stock_count' => $request->stock_count,
            'email' => $request->email,
            'image' => $image
        ];
        //dd($product);
        Product::create($product);
        return redirect()->route('product.index')->with('status', 'Product Updated Successfully');

      }


    public function show(Product $product)
    {

        return view('product.show', compact('product'));
    }


    public function edit(Product $product)
    {

        $categories = Category::all();

        return view('product.edit', compact('categories', 'product'));
    }


    public function update(Request $request, Product $product)
    {

        $image = '';
        if ($request->hasFile('image')) {
          $image = time() . '.' . $request->file->extension();
          $request->file->storeAs('public/images', $product);
          if ($product->image) {
            Storage::delete('public/images/' . $product->image);
          }
        } else {
          $image = $product->image;
        }

        $prod = [
            'name' => $request->name,
            'category_id' => $request->category_id,
            'stock_count' => $request->stock_count,
            'email' => $request->email,
            'image' => $image
        ];
    //   dd($product);
       $product->update($prod);


        return redirect('/product')->with(['message' => 'Product updated successfully!', 'status' => 'success']);
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('status', 'Product deleted Successfully');
    }
}
