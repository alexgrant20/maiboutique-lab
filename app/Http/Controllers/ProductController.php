<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Models\CartDetail;
use App\Models\Product;


class ProductController extends Controller
{
  public function __construct()
  {
    $this->middleware('role:admin', ['only' => ['create', 'store', 'destroy']]);
    $this->middleware('auth', ['only' => ['show', 'index', 'indexSearch']]);
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
  public function indexSearch()
  {
    $products = Product::filterName(request('name'))->paginate(8)->withQueryString();

    return view('app.product.search', [
      'products' => $products
    ]);
  }

  public function destroy(Product $product)
  {
    CartDetail::where('product_id', $product->id)->delete();

    $product->delete();

    return redirect()->route('index');
  }

  public function create()
  {
    return view('app.product.create');
  }

  public function store(CreateProductRequest $request)
  {

    $imageName = $request->name . '-' . time() . '-' . $request->file('image')->getClientOriginalName();
    $fullPath = "/storage/product/{$imageName}";
    $request->image->move(public_path('/storage/product'), $imageName);

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
