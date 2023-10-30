<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class MenusController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        $categories = Categories::all();
        return view('admin.menus.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:menus,name',
            'description' => 'required|string',
            'image' => 'required|unique:menus,image',
        ]);
        $image = $request->file('image');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $image_name);
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->description = $request->description;
        $menu->image = $image_name;
        $menu->save();
        return to_route('admin.menus.index')->with('success', 'Menus created successfully.');
    }

    public function edit(Request $request, $id)
    {
        $menu = Menu::find($id);
        return view('admin.menus.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'required',
            'description' => 'required|string',
        ]);
        $image = $request->file('image');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $image_name);
        $menu = Menu::find($id);
        $menu->name = $request->name;
        $menu->description = $request->description;
        $menu->image = $image_name;
        $menu->save();
        return to_route('admin.menus.index')->with('success', 'Menus updated successfully.');
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return to_route('admin.menus.index')->with('success', 'Item deleted successfully.');
    }
}
