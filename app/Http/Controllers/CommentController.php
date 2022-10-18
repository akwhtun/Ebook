<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    //create Comment
    public function createComment(Request $request)
    {
        $this->getValidationCheck($request);
        $data = $this->getData($request);
        Comment::create($data);
        return back();
    }

    //view all Comment
    public function viewComment($bookId)
    {
        $comments = Comment::where('book_id', $bookId)->get();
        if (Auth::user() != null) {
            $carts = Cart::where('user_id', Auth::user()->id)->get();
            return view('user.comment-view', compact('comments', 'carts', 'bookId'));
        } else {
            return view('user.comment-view', compact('comments', 'bookId'));
        }
    }


    //delete Comment
    public function deleteComment($id)
    {
        $comment = Comment::where('id', $id)->first();

        if (Gate::allows('comment-delete', $comment)) {
            $comment->delete();
            return back()->with(['deleteSuccess' => 'Comment deleted!']);
        }
    }

    //edit Comment
    public function editComment($id)
    {
        $comment = Comment::where('id', $id)->first();

        if (Gate::allows('comment-edit', $comment)) {
            return view('user.comment-edit', compact('comment'));
        }
    }

    //update Comment
    public function updateComment($id, Request $request)
    {
        $data = Comment::where('id', $id)->first();
        $this->getValidationCheck($request);
        Comment::where('id', $id)->update([
            'content' => $request->content,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('book#detail', $data->book_id)->with(['updateSuccess' => 'Comment Updated!']);
    }

    //get data
    public function getData($request)
    {
        return [
            'book_id' => $request->bookId,
            'content' => $request->content,
            'user_id' => $request->userId
        ];
    }

    //validation
    public function getValidationCheck($request)
    {
        $validation = [
            'content' => 'required'
        ];
        Validator::make($request->all(), $validation)->validate();
    }
}