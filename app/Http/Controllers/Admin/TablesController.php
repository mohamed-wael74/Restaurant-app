<?php

namespace App\Http\Controllers\Admin;
use App\Models\Table;
use App\Http\Controllers\Controller;
use App\Http\Requests\TableStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TablesController extends Controller
{
    public function index()
    {
        $tables = Table::all();
        return view('admin.tables.index',compact('tables'));
    }

    public function create()
    {
        return view('admin.tables.create');
    }

    public function store(TableStoreRequest $request)
    {
        Table::create([
            'name' => $request->name,
            'guest_number' => $request->guest_number,
            'status' => $request->status,
            'location' => $request->location
        ]);

        return to_route('admin.tables.index')->with('success', 'Table Created successfully.');
    }

    public function edit(Request $request, $id)
    {
        $table = Table::find($id);
        return view('admin.tables.edit', compact('table'));
    }

    public function update(TableStoreRequest $request, $id)
    {
        $table = Table::find($id);
        $table->name = $request->name;
        $table->guest_number = $request->guest_number;
        $table->status = $request->status;
        $table->location = $request->location;
        $table->save();
        return to_route('admin.tables.index')->with('success', 'Table updated successfully.');
    }

    public function destroy($id)
    {
        $table = Table::find($id);
        $table->reservation()->delete();
        $table->delete();
        return to_route('admin.tables.index')->with('success', 'Table deleted successfully.');
    }
}
