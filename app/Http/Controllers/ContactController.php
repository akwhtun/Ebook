<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    //get list by admin
    public function list()
    {
        $lists = Contact::latest()->paginate(6);
        return view('admin.contact-lists', compact('lists'));
    }

    //choose list by admin
    public function chooseList($status)
    {
        $lists = Contact::where('status', $status)->latest()->paginate(6);
        return view('admin.contact-lists', compact('lists'));
    }

    //change list status by admin
    public function changeStatus($id, $status)
    {
        Contact::where('id', $id)->update([
            'status' => $status
        ]);
        return back();
    }

    //view by admin
    public function view($id)
    {
        $contact = Contact::where('id', $id)->first();

        return view('admin.contact-view', compact('contact'));
    }

    //contact us
    public function contact()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('contact.contact', compact('carts'));
    }


    //send
    public function send(Request $request)
    {
        Validator::make($request->all(), [
            'subject' => 'required|min:15'
        ])->validate();

        Contact::create([
            'user_id' => $request->userId,
            'subject' => $request->subject
        ]);

        return redirect()->route('contact#success');
    }

    //success
    public function success()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        return view('contact.success', compact('carts'));
    }
}