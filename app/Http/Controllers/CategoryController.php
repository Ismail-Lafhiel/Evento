<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10); 
        return view("admin.categories.index", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(['category_name' => 'required|min:3']);
        $category = Category::create($validated);
        return redirect()->route('admin.categories.index')->with("success", "{$category->category_name} is created successfuly");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("admin.categories.edit", compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate(['category_name' => 'required|min:3']);
        $category = Category::findOrFail( $category->id );
        $category->update($validated);
        return redirect()->route("admin.categories.index")->with("success", "{$category->category_name} is updated successfuly");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success', "{$category->category_name} is deleted successfully");

        return response()->json(['success' => true, 'message' => "{$category->category_name} deleted successfully"]);
}
}
