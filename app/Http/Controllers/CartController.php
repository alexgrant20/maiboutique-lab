<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\CartDetail;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
  public function index()
  {
    $cart = Cart::with('cartDetail', 'cartDetail.product')->where('user_id', Auth::id())->firstOrFail();

    $totalPrice = 0;

    foreach ($cart->cartDetail as $cartDetail) {
      $totalPrice += $cartDetail->quantity * $cartDetail->product->price;
    }

    return view('app.cart.index', compact('cart', 'totalPrice'));
  }

  public function store(StoreCartRequest $request)
  {
    $cart = Cart::where(['user_id' => Auth::id()])->firstOrFail();

    CartDetail::updateOrCreate(
      [
        'cart_id' => $cart->id,
        'product_id' => $request->product_id,
      ],
      [
        'quantity' => $request->quantity
      ]
    );

    return redirect()->route('cart.index');
  }

  public function edit(CartDetail $cartDetail)
  {
    // dd($cartDetail);

    return view('app.cart.edit', compact('cartDetail'));
  }

  public function update(UpdateCartRequest $request, CartDetail $cartDetail)
  {
    $cartUpdated = $request->safe()->toArray();

    //   dd($cartUpdated);

    $cartDetail->update($cartUpdated);

    return redirect()->route('cart.index');
  }

  public function destroy(CartDetail $cartDetail)
  {
    // dd($cartDetail);
    $cartDetail->delete();

    return back();
  }
}
