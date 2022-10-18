<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\OrderList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderListController extends Controller
{
    //order list
    public function orderHistory($userId)
    {
        $orderLists = OrderList::where('user_id', $userId)->get();
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('order.history', compact('orderLists', 'carts'));
    }
}