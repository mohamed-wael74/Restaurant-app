<?php

namespace App\Http\Controllers\Admin;
use App\Models\Categories;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        
        return view('admin.categories.index',compact('categories'));
    }

    public function create()
    {
        $menus = Menu::all();
        return view('admin.categories.create',compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|unique:categories,name',
            'description'=>'required|string',
            'price' => 'required|numeric',
            'image' => 'required',
            'menu_id'=>'required'
        ]);
        $image = $request->file('image');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $image_name);
        $category = new Categories();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->price = $request->price;
        $category->image = $image_name;
        $category->menu_id = $request->menu_id;
        $category->save();
        return to_route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(Request $request, $id)
    {
        $category = Categories::find($id);
        $menus = Menu::all();
        return view('admin.categories.edit',compact('category','menus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|string',
            'description'=>'required|string',
            'price' => 'required|numeric',
            'image' => 'required',
            'menu_id'=>'required'
        ]);
        $image = $request->file('image');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $image_name);
        $category = Categories::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->price = $request->price;
        $category->image = $image_name;
        $category->menu_id = $request->menu_id;
        $category->save();
        return to_route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Categories::find($id);
        $category->delete();
        return to_route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
