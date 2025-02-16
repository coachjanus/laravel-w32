<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $categories = (new Category)->all();
        // $categories = (new Category)->paginate(5);
        $categories = Category::paginate(5);

        return view('admin.categories.index', ['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        // $category = new Category();
        // $category->name = $request->name;
        // $category->status = $request->status ? true : false;
        // $category->save();

        $validated = $request->validate([
            'name' => 'required|unique:categories|min:3|max:20',
        ]);

        Category::create([
            'name' => $request->name,
            'status' => $request->status ? true : false
        ]);

        return redirect()->route('admin.categories.index')->with('success', "Category created successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', ['category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
            'status' => $request->status ? true : false
        ]);
        return redirect()->route('admin.categories.index')->with('success', "Category updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', "Category moved to trash successfully");
    }

    public function trashed() {
        $categories = Category::onlyTrashed()->paginate();
        return view('admin.categories.trashed', compact('categories'));
    }

    public function restore($id) {
        Category::withTrashed()
        ->where('id', $id)
        ->restore();
        return redirect()->route('admin.categories.trashed')->with('success', "Category restored successfully");
    }

    public function forceDelete($id) {
        $category = Category::withTrashed()->where('id', $id)->first();
        $category->forceDelete();
        return redirect()->route('admin.categories.trashed')->with('success', "Category deleted successfully");
    }
}
