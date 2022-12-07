<?php

namespace App\Http\Controllers;

use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
   public function index()
   {
      $transaction = TransactionHeader::with('transactionDetail')->where('user_id', Auth::id())->get();

        // dd($transaction);

      return view('app.transaction.index', compact('transaction'));
   }
}
