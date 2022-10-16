<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $subTotal = 0;
        foreach ($cartLists as $list) {
            $subTotal += $list->book->price * $list->qty;
        }

        return view('cart.cart', compact('cartLists', 'carts', 'subTotal'));
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