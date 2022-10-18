<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderItemController extends Controller
{
    //order list
    public function historyList($code)
    {
        $lists = OrderItem::where('order_code', $code)->get();
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('order.list', compact('lists', 'carts'));
    }

    //order success
    public function orderSuccess()
    {
        return view('order.success');
    }
}