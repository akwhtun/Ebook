<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class FilterController extends Controller
{

    //pagination
    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $books = Book::latest()->paginate(9);

            return view('user.bookData', compact('books'))->render();
        }
    }

    //filter author
    public function filterAuthor(Request $request, $id)
    {
        if ($request->ajax()) {
            $books = Book::where('author_id', $id)->paginate(9);
            // dd($books);
            return view('user.bookData', compact('books'))->render();
        }
    }


    //filter category
    public function filterCategory(Request $request, $id)
    {
        if ($request->ajax()) {
            $books = Book::where('category_id', $id)->paginate(9);

            return view('user.bookData', compact('books'))->render();
        }
    }

    // all book
    public function allBook(Request $request)
    {
        if ($request->ajax()) {
            $books = Book::latest()->paginate(9);

            return view('user.bookData', compact('books'))->render();
        }
    }
}