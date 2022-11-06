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
      $cart = Cart::with('cartDetail')->where('user_id', Auth::id())->firstOrFail();

      return view('', compact('cart'));
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
      $cartProduct = $cartDetail->with('product');

      return redirect()->route('cart.edit', compact('cartProduct'));
   }

   public function update(UpdateCartRequest $request, CartDetail $cartDetail)
   {
      $cartUpdated = $request->safe();

      $cartDetail->update($cartUpdated);

      return redirect()->route('cart.index');
   }

   public function destroy(CartDetail $cartDetail)
   {
      $cartDetail->delete();

      return back();
   }
}
