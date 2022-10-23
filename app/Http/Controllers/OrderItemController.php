<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\OrderItem;
use App\Models\OrderList;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderItemController extends Controller
{
    //order list
    public function historyList($code)
    {
        $lists = OrderItem::where('order_code', $code)->get();
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        $mode = View::where('id', 1)->first();
        return view('order.list', compact('lists', 'carts', 'mode'));
    }

    //order success
    public function orderSuccess()
    {
        $mode = View::where('id', 1)->first();
        return view('order.success', compact('mode'));
    }

    //view order by admin
    public function orderListDetail($code, $status)
    {
        $lists = OrderItem::where('order_code', $code)->paginate(8);
        $totalPrice = OrderList::select('total_price')->where('order_code', $code)->first();
        return view('order.detail', compact('lists', 'status', 'totalPrice'));
    }
}