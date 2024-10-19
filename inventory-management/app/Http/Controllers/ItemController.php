<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $items = Item::when($request->filled('quantity'), function ($query) use ($request) {
            $query->where('quantity', '>=', $request->input('quantity'));
        })
        ->when($request->filled('price'), function ($query) use ($request) {
            $query->where('price', '>=', $request->input('price'));
        })
        ->orderBy($request->input('sort_by', 'item_name'), $request->input('sort_order', 'asc'))
        ->paginate(10);

        return view('items.index', compact('items'));
    }

    public function create()
    {
        $items = Item::all(); 
        return view('items.create', compact('items')); 
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'supplier' => 'required|string|max:255',
            'expiry_date' => 'required|date|after:today', 
        ]);

        Item::create($request->all());
        return redirect()->route('items.create')->with('success', 'Item created successfully.');
    }


    public function edit(Item $item)
    {
        $items = Item::all();
        return view('items.edit', compact('item', 'items'));
    }

   
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'supplier' => 'required|string|max:255',
            'expiry_date' => 'required|date|after:today', 
        ]);

        $item->update($request->all());
        return redirect()->route('items.create')->with('success', 'Item updated successfully.');
    }

    
    public function destroy($id)
    {
        $deleted = DB::delete('DELETE FROM items WHERE id = ?', [$id]);
        return redirect()->back()->with('success', 'Item deleted successfully!');
    
    }
}