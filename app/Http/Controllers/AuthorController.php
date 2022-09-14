<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    //Author Lists
    public function showAuthorList()
    {
        $authors = Author::orderBy('id', 'desc')->paginate(3);
        return view('admin.author-lists', compact('authors'));
    }

    //Add Author
    public function addAuthor()
    {
        return view('admin.author-add');
    }

    //Create Author
    public function createAuthor(Request $request)
    {
        $this->authorValidationCheck($request);
        $data = $this->getAuthorInfo($request);
        if ($request->hasFile('authorPhoto')) {
            $authorPhoto = uniqid() . $request->file('authorPhoto')->getClientOriginalName();
            $request->file('authorPhoto')->storeAs('public/author', $authorPhoto);
            $data['photo'] = $authorPhoto;
        }
        Author::create($data);
        return redirect()->route('author#add')->with(['createAuthorSuccess' => 'Author Created Successfully']);
    }

    //delete Author
    public function deleteAuthor($id)
    {
        $oldDbImage = Author::select('photo')->where('id', $id)->first();
        $oldDbImageName = $oldDbImage->photo;
        if ($oldDbImageName != null) {
            Storage::delete('public/author/' . $oldDbImageName);
        }
        Author::where('id', $id)->delete();
        return redirect()->route('author#list')->with(['deleteAuthorSuccess' => 'Author Deleted Successfully']);
    }

    //view Author
    public function viewAuthor($id)
    {
        $author = Author::where('id', $id)->first();
        return view('admin.author-view', compact('author'));
    }

    //edit Author
    public function editAuthor($id)
    {
        $author = Author::where('id', $id)->first();
        return view('admin.author-edit', compact('author'));
    }

    public function updateAuthor(Request $request)
    {
        $updateId = $request->authorId;
        $this->authorValidationCheck($request);
        $updateData = $this->getAuthorInfo($request);
        if ($request->hasFile('authorPhoto')) {
            $oldDbImage = Author::select('photo')->where('id', $updateId)->first();
            $oldDbImageName = $oldDbImage->photo;
            if ($oldDbImageName != null) {
                Storage::delete('public/author/' . $oldDbImageName);
            }
            $updateImageName = uniqid() . $request->file('authorPhoto')->getClientOriginalName();
            $request->file('authorPhoto')->storeAs('public/author', $updateImageName);
            $updateData['photo'] = $updateImageName;
        }
        Author::where('id', $updateId)->update($updateData);
        return redirect()->route('author#list')->with(['updateAuthorSuccess' => 'Author Updated Successfully']);
    }

    //get Data
    private function getAuthorInfo($request)
    {
        return [
            'name' => $request->authorName,
            'age' => $request->authorAge,
            'gender' => $request->gender,
        ];
    }

    private function authorValidationCheck($request)
    {
        $validateData = [
            'authorName' => 'required|unique:authors,name,' . $request->authorId,
            'authorAge' => 'required',
            'gender' => 'required',
            'authorPhoto' => 'mimes:jpg,png,jpeg,webp',
        ];
        Validator::make($request->all(), $validateData)->validate();
    }
}