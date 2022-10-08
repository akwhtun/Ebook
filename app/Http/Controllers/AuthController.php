<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Mime\MimeTypes;

class AuthController extends Controller
{

    //Register Page
    public function registerPage()
    {
        return view('registerPage');
    }

    //Login Page
    public function loginPage()
    {
        return view('loginPage');
    }

    //View Account Detail
    public function viewDetail()
    {
        return view('account.detail');
    }

    //Edit Account Detail
    public function editDetail()
    {
        return view('account.edit');
    }

    //Update Account Detail
    public function updateDetail(Request $request)
    {
        $this->validationCheck($request);
        $id = Auth::user()->id;
        $updateData = $this->getAccData($request);
        if ($request->hasFile('profile')) {
            $oldProfile = User::select('image')->where('id', $id)->first();
            $oldProfileName = $oldProfile->image;
            if ($oldProfileName != null) {
                Storage::delete('public/userProfile/' . $oldProfileName);
            }
            $profile = uniqid() . $request->file('profile')->getClientOriginalName();
            $request->file('profile')->storeAs('public/userProfile', $profile);
            $updateData['image'] = $profile;
        }
        User::where('id', $id)->update($updateData);
        return redirect()->route('account#detail')->with(['updateSuccess' => 'Account Update Success']);
    }

    //view admin list
    public function viewAdminList()
    {
        $admins = User::where('role', 'admin')->orderBy('id', 'desc')->paginate(5);
        return view('adminAccount.list', compact('admins'));
    }

    //view user list
    public function viewUserList()
    {
        $users = User::where('role', 'user')->orderBy('id', 'desc')->paginate(5);
        return view('userAccount.list', compact('users'));
    }

    //change role
    public function changeRole($role, $id)
    {
        User::where('id', $id)->update([
            'role' => $role
        ]);
        return back();
    }

    //delete account
    public function deleteAccount($id)
    {
        $userImage = User::select('image')->where('id', $id)->first();
        $userImageName = $userImage->image;
        if ($userImageName != null) {
            Storage::delete('public/userProfile/' . $userImageName);
        }
        User::where('id', $id)->delete();
        return back()->with(['deleteAccSuccess' => 'Account Deleted!']);
    }

    //suspended account
    public function suspend($id)
    {
        User::where('id', $id)->update([
            'suspend' => '1'
        ]);
        return back();
    }

    //unsuspended account
    public function unsuspend($id)
    {
        User::where('id', $id)->update([
            'suspend' => '0'
        ]);
        return back();
    }

    //get account info data
    public function getAccData($request)
    {
        return [
            'name' => $request->name,
            'gender' => $request->gender,
        ];
    }

    //Account validation check
    public function validationCheck($request)
    {
        $validation = [
            'profile' => 'mimes:jpg,png,jpeg,webp',
            'name' => 'required',
            'gender' => 'required',
        ];
        Validator::make($request->all(), $validation)->validate();
    }
}