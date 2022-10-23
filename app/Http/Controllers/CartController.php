<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\OrderItem;
use App\Models\OrderList;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    //add cart
    public function addCart(Request $request)
    {
        $data = $this->getData($request);
        Cart::create($data);
        $response = [
            'message' => 'added to cart',
            'status' => 'true'
        ];
        return response()->json($response, 200);
    }

    //view cart
    public function viewCart(Request $request, $userName)
    {
        $userId = $request->userId;
        $cartLists = Cart::where('user_id', $userId)->get();
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        $mode = View::where('id', 1)->first();

        $subTotal = 0;
        foreach ($cartLists as $list) {
            $subTotal += $list->book->price * $list->qty;
        }

        return view('cart.cart', compact('cartLists', 'carts', 'subTotal', 'mode'));
    }

    //delete cart
    public function deleteCart(Request $request)
    {
        $id = $request->cartId;
        Cart::where('id', $id)->delete();
        return response()->json(200);
    }

    //clear cart
    public function clearCart()
    {
        Cart::where('user_id', Auth::user()->id)->delete();
        return response()->json(200);
    }

    //order cart
    public function order(Request $request)
    {
        $totalPrice = 3000;
        $userId = $request[0]['user_id'];
        $code = $request[0]['order_code'];
        $address = $request[0]['address'];

        foreach ($request->all() as $order) {
            // OrderItem::create([
            //     'user_id' => $order['userId'],
            //     'book_id' => $order['bookId'],
            //     'qty' => $order['qty'],
            //     'total_price' => $order['totalPrice'],
            //     'order_code' => $order['orderCode'],
            //     'address' => $order['address'],
            // ]);
            OrderItem::create($order);
            $totalPrice += $order['total_price'];
        }

        Cart::where('user_id', Auth::user()->id)->delete();

        OrderList::create([
            'user_id' => $userId,
            'total_price' => $totalPrice,
            'order_code' => $code,
            'address' => $address
        ]);

        return response()->json(200);
    }

    //get data
    public function getData($request)
    {
        return [
            'user_id' => $request->userId,
            'book_id' => $request->bookId,
            'qty' => $request->qty
        ];
    }
}