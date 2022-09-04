<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    //get all books
    public function getAllBooks()
    {
        $books = Book::latest()->paginate(10);
        $latestBooks = Book::latest()->paginate(6);
        return view('books', compact('books', 'latestBooks'));
    }

    //add book
    public function addBook()
    {
        $categories = [
            ['id' => 1, 'name' => 'Helath'],
            ['id' => 2, 'name' => 'Business'],
            ['id' => 3, 'name' => 'Agricultural'],
            ['id' => 4, 'name' => 'Technical'],
            ['id' => 5, 'name' => 'Language'],
            ['id' => 6, 'name' => 'Religion'],
            ['id' => 7, 'name' => 'Magazine'],
            ['id' => 8, 'name' => 'Knowledge'],
            ['id' => 9, 'name' => 'Comic'],
            ['id' => 10, 'name' => 'History'],
            ['id' => 11, 'name' => 'Journal'],
            ['id' => 12, 'name' => 'Lyrics'],
            ['id' => 13, 'name' => 'Comedy'],
        ];
        return view('admin.book-add', compact('categories'));
    }

    //create book
    public function createBook(Request $request)
    {
        $this->validation($request);
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
        $books = Book::latest()->paginate(7);
        return view('admin.book-lists', compact('books'));
    }

    //view book detail
    public function viewBook($id)
    {
        $viewBook = Book::where('id', $id)->first();
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
        $categories = [
            ['id' => 1, 'name' => 'Helath'],
            ['id' => 2, 'name' => 'Business'],
            ['id' => 3, 'name' => 'Agricultural'],
            ['id' => 4, 'name' => 'Technical'],
            ['id' => 5, 'name' => 'Language'],
            ['id' => 6, 'name' => 'Religion'],
            ['id' => 7, 'name' => 'Magazine'],
            ['id' => 8, 'name' => 'Knowledge'],
            ['id' => 9, 'name' => 'Comic'],
            ['id' => 10, 'name' => 'History'],
            ['id' => 11, 'name' => 'Journal'],
            ['id' => 12, 'name' => 'Lyrics'],
            ['id' => 13, 'name' => 'Comedy'],
        ];
        $editBook = Book::where('id', $id)->first();
        return view('admin.book-edit', compact('editBook', 'categories'));
    }

    //update Book
    public function updateBook(Request $request)
    {
        $this->validation($request);
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
            'author' => $request->authorName,
            'summary' => $request->summary,
            'price' => $request->bookPrice,
            'category_id' => $request->category_id
        ];
        return $data;
    }

    //private validate
    private function validation($request)
    {
        $validationRules = [
            'bookTitle' => 'required',
            'authorName' => 'required',
            'summary' => 'required|min:15',
            'bookPrice' => 'required',
            'bookPhoto' => 'mimes:jpg,png,jpeg',
            'pdf' => 'required',
        ];
        Validator::make($request->all(), $validationRules)->validate();
    }
}