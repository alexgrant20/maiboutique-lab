<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
  public function index()
  {
    $transaction = TransactionHeader::with('transactionDetail')->where('user_id', Auth::id())->get();
    $transaction = $transaction->sortByDesc('created_at');
    // dd($transaction);

    return view('app.transaction.index', compact('transaction'));
  }

  public function store()
  {
    $cartDetails = auth()->user()->cart->cartDetail;

    if ($cartDetails->isEmpty()) {
      return redirect()->route('index');
    }

    $transactionHeader = TransactionHeader::create([
      'user_id' => Auth::id(),
      'total_item' => $cartDetails->sum('quantity')
    ]);

    $totalPrice = 0;

    foreach ($cartDetails as $cartDetail) {
      $product = Product::find($cartDetail->product_id);

      TransactionDetail::create([
        'transaction_header_id' => $transactionHeader->id,
        'product_id' => $cartDetail->product_id,
        'quantity' => $cartDetail->quantity,
        'price' => $product->price,
      ]);

      $totalPrice += $cartDetail->quantity * $product->price;
    }

    $transactionHeader->total_price = $totalPrice;
    $transactionHeader->save();

    auth()->user()->cart->cartDetail()->delete();

    return redirect()->route('trx');
  }
}
