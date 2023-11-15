<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //Index Page(Listing Page)
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.list', compact('categories'));
    }

    //Store(Store new data)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category = new Category();

        $category->name = $request->name;
        $category->slug = str($request->name)->slug();
        $category->save();
        return back();
    }

    //Edit Page(Edit Form)
    public function edit($id)
    {
        return view('backend.category.edit');
    }

    //Update(Update Single Data)
    public function update(Request $request, $id)
    {
    }

    //Delete(Delete Single Data)
    public function delete($id)
    {
    }
}
