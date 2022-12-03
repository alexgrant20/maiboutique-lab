<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Models\Product;


class ProductController extends Controller
{
   public function __construct()
   {
      $this->middleware('role:admin', ['only' => ['create', 'store', 'destroy']]);
      $this->middleware('auth', ['only' => ['show', 'index']]);
   }

   public function index()
   {
      $products = Product::paginate(8);

      return view('app.product.index', [
         'products' => $products
      ]);
   }

   public function show($id)
   {
        $product = Product::find($id);
        return view('app.product.show', compact('product'));
   }

   public function destroy(Product $product)
   {
      $product->delete();

      return redirect()->route('index');
   }

   public function create()
   {
      return view('app.product.create');
   }

   public function store(CreateProductRequest $request)
   {
      $imageName = $request->name . '-' . time();
      $fullPath = "/storage/product/{$imageName}";
      $request->image->move(public_path($fullPath));

      Product::create([
         'image' => $fullPath,
         'name' => $request->name,
         'description' => $request->description,
         'price' => $request->price,
         'stock' => $request->stock,
      ]);

      return redirect()->route('index');
   }
}
