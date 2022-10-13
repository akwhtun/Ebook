<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{

    //get all books
    public function getAllBooks()
    {
        $books = Book::select('books.*', 'categories.name as category_name', 'authors.name as author_name')
            ->leftJoin('categories', 'books.category_id', 'categories.id')
            ->leftJoin('authors', 'books.author_id', 'authors.id')
            ->orderBy('books.id', 'desc')->paginate(6);
        $latestBooks = Book::latest()->paginate(6);
        return view('user.books', compact('books', 'latestBooks'));
    }

    //add book
    public function addBook()
    {
        $categories = Category::get();
        $authors = Author::get();
        return view('admin.book-add', compact('categories', 'authors'));
    }

    //create book
    public function createBook(Request $request)
    {
        $this->validation($request, 'create');
        $data = $this->getData($request);

        if ($request->hasFile('bookPhoto')) {
            $photoName = uniqid() . $request->file('bookPhoto')->getClientOriginalName();
            $request->file('bookPhoto')->storeAs('public/cover', $photoName);
            $data['photo'] = $photoName;
        }

        if ($request->hasFile('pdf')) {
            $pdfFile = uniqid() . $request->file('pdf')->getClientOriginalName();
            $request->file('pdf')->storeAs('public/pdf', $pdfFile);
            $data['pdf'] = $pdfFile;
        }
        Book::create($data);
        return redirect()->route('book#add')->with(['createSuccess' => 'Book created successfully']);
    }

    //show book list
    public function showBookList()
    {
        $books = Book::select('books.*', 'categories.name as category_name', 'authors.name as author_name')
            ->leftJoin('categories', 'books.category_id', 'categories.id')
            ->leftJoin('authors', 'books.author_id', 'authors.id')
            ->when(request('searchKey'), function ($query) {
                $query->where('books.title', 'like', '%' . request('searchKey') . '%');
            })
            ->orderBy('books.id', 'desc')->paginate(5);
        $books->appends(request()->all());
        return view('admin.book-lists', compact('books'));
    }

    //view book detail
    public function viewBook($id)
    {
        $viewBook = Book::select('books.*', 'categories.name as category_name', 'authors.name as author_name')
            ->leftJoin('categories', 'books.category_id', 'categories.id')
            ->leftJoin('authors', 'books.author_id', 'authors.id')
            ->where('books.id', $id)->first();
        return view('admin.book-view', compact('viewBook'));
    }

    //delete book
    public function deleteBook($id)
    {
        $deleteBook = Book::where('id', $id)->first();
        $deletePhoto = $deleteBook->photo;
        $deletePdf = $deleteBook->pdf;
        if ($deletePhoto != null) {
            Storage::delete('public/cover/' . $deletePhoto);
        }
        if ($deletePdf != null) {
            Storage::delete('public/pdf/' . $deletePdf);
        }
        $deleteBook->delete();
        return redirect()->route('book#list')->with(['deleteSuccess' => 'This book was delete successfully']);
    }

    //edit book
    public function editBook($id)
    {
        $categories = Category::get();
        $authors = Author::get();
        $editBook = Book::where('id', $id)->first();
        return view('admin.book-edit', compact('editBook', 'categories', 'authors'));
    }

    //update Book
    public function updateBook(Request $request)
    {
        $this->validation($request, 'update');
        $updateData = $this->getData($request);
        $updateId = $request->bookId;
        if ($request->hasFile('bookPhoto')) {
            $oldPhoto = Book::select('photo')->where('id', $updateId)->first();
            $oldPhotoName = $oldPhoto->photo;
            if ($oldPhotoName != null) {
                Storage::delete('public/cover/' . $oldPhotoName);
            }
            $updatePhotoName = uniqid() . $request->file('bookPhoto')->getClientOriginalName();
            $request->file('bookPhoto')->storeAs(('public/cover/'), $updatePhotoName);
            $updateData['photo'] = $updatePhotoName;
        }
        if ($request->hasFile('pdf')) {
            $oldPdf = Book::select('pdf')->where('id', $updateId)->first();
            $oldPdfName = $oldPdf->pdf;
            Storage::delete('public/pdf/' . $oldPdfName);
            $updatePdfName = uniqid() . $request->file('pdf')->getClientOriginalName();
            $request->file('pdf')->storeAs(('public/pdf/'), $updatePdfName);
            $updateData['pdf'] = $updatePdfName;
        }
        Book::where('id', $updateId)->update($updateData);
        return redirect()->route('book#list')->with(['updateSuccess' => 'Book update successfully']);
    }

    //private get data
    private function getData($request)
    {
        $data = [
            'title' => $request->bookTitle,
            'author_id' => $request->authorId,
            'summary' => $request->summary,
            'price' => $request->bookPrice,
            'category_id' => $request->categoryId
        ];
        return $data;
    }

    //private validate
    private function validation($request, $status)
    {
        if ($status == 'create') {
            $validationRules = [
                'bookTitle' => 'required|unique:books,title',
                'authorId' => 'required',
                'summary' => 'required|min:15',
                'bookPrice' => 'required',
                'categoryId' => 'required',
                'bookPhoto' => 'mimes:jpg,png,jpeg,webp',
                'pdf' => 'required|mimes:pdf',
            ];
        } else {
            $validationRules = [
                'bookTitle' => 'required|unique:books,title,' . $request->bookId,
                'summary' => 'required|min:15',
                'bookPrice' => 'required',
                'bookPhoto' => 'mimes:jpg,png,jpeg',
            ];
        }
        Validator::make($request->all(), $validationRules)->validate();
    }

    //download book
    public function download($id)
    {
        $book = Book::where('id', $id)->first();
        $pdf = $book->pdf;
        return Storage::download("public/pdf/" . $pdf);
    }

    //view book
    public function viewBookDetail($id)
    {
        $bookDetail = Book::where('id', $id)->first();

        // $books = [];
        // for ($i = 0; $i < 6; $i++) {
        //     $book = Book::all()->random()->toArray();
        //     $books .= $book;
        // }
        // dd($books);
        return view('user.bookDetail', compact('bookDetail'));
    }
}