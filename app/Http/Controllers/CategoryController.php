<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //category list
    public function showCategoryList()
    {
        $categories = Category::orderBy('id', 'desc')->paginate('7');

        return view('admin.category-lists', compact('categories'));
    }

    //category create
    public function createCategory(Request $request)
    {
        $this->getValidationCheck($request);
        $data = $this->getData($request);
        Category::create($data);
        return back()->with(['createCategorySuccess' => 'Category Created']);
    }

    //category delete
    public function deleteCategory($id)
    {
        Category::where('id', $id)->delete();
        return back()->with(['deleteCategorySuccess' => 'Category Deleted!']);
    }

    //category update
    public function updateCategory(Request $request)
    {
        $id = $request->categoryId;
        Validator::make($request->all(), ['categoryUpdateName' => 'required|unique:categories,name,' . $request->categoryId])->validate();

        Category::where('id', $id)->update([
            'name' => $request->categoryUpdateName
        ]);
        return back()->with(['updateCategorySuccess' => 'Category Updated!']);
    }

    //category get
    private function getData($request)
    {
        return [
            'name' => $request->categoryName
        ];
    }

    //category validation
    private function getValidationCheck($request)
    {
        $validation = [
            'categoryName' => 'required|unique:categories,name,',
        ];
        Validator::make($request->all(), $validation)->validate();
    }
}