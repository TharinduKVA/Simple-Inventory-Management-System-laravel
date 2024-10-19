@extends('layouts.app')
@section('title', 'Items List')
@section('content')
    <h1>Items</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="bold-border">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Supplier</th>
                <th>Expiry Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->item_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->supplier }}</td>
                    <td>{{ $item->expiry_date }}</td>
                    <td>
                        <a href="{{ route('items.edit', $item) }}">Edit</a>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete Item</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br><br>
    {{ $items->links() }}

    <form action="{{ route('items.index') }}" method="get">
    <table>
    <thead>
        <tr>
            <th>Quantity</th>
            <th>Price</th>
            <th>Sort By</th>
            <th>Sort Order</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <input type="number" id="quantity" name="quantity" value="{{ request('quantity') }}">
            </td>
            <td>
                <span>Rs</span>
                <input type="number" id="price" name="price" value="{{ request('price') }}">
            </td>
            <td>
                <select id="sort_by" name="sort_by">
                    <option value="item_name" {{ request('sort_by') == 'item_name' ? 'selected' : '' }}>Item Name</option>
                    <option value="quantity" {{ request('sort_by') == 'quantity' ? 'selected' : '' }}>Quantity</option>
                    <option value="price" {{ request('sort_by') == 'price' ? 'selected' : '' }}>Price</option>
                </select>
            </td>
            <td>
                <select id="sort_order" name="sort_order">
                    <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>Ascending</option>
                    <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>Descending</option>
                </select>
            </td>
        </tr>
        <tr><td><button type="submit">Filter and Sort</button></td></tr>
    </tbody>
</table>
</form>

@endsection