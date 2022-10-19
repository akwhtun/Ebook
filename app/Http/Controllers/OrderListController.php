<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\OrderList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderListController extends Controller
{
    //view order list by user
    public function orderHistory($userId)
    {
        $orderLists = OrderList::where('user_id', $userId)->get();
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('order.history', compact('orderLists', 'carts'));
    }

    //view orderlist by admin
    public function orderList()
    {
        $orderLists = OrderList::latest()->paginate(8);

        return view('admin.order-lists', compact('orderLists'));
    }

    //change status by admin
    public function changeStatus($id, $status)
    {
        OrderList::where('id', $id)->update(
            [
                'status' => $status
            ]
        );
        return back();
    }

    //choose status by admin
    public function orderStatus($status)
    {
        $orderLists = OrderList::where('status', $status)->paginate(8);

        return view('admin.order-lists', compact('orderLists'));
    }
}