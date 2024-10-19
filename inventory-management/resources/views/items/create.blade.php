@extends('layouts.app')
@section('title', 'Create')
@section('content')
    <h1>Create Item</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <br>

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
    <form action="{{ route('items.store') }}" method="post">
        @csrf
        <table>
        <tr>
            <td><label for="item_name">Item Name:</label></td>
            <td><input type="text" id="item_name" name="item_name" required></td>
        </tr>

        <tr>
            <td><label for="quantity">Quantity:</label></td>
            <td><input type="number" id="quantity" name="quantity" required></td>
        </tr>

        <tr>
            <td><label for="price">Price:</label></td>
            <td>
                <span>Rs</span>
                <input type="number" id="price" name="price" style="width: 145px;" value="{{ old('price') }}" required>
            </td>
        </tr>

        <tr>
            <td><label for="supplier">Supplier:</label></td>
            <td><input type="text" id="supplier" name="supplier" required></td>
        </tr>

        <tr>
            <td><label for="expiry_date">Expiry Date:</label></td>
            <td><input type="date" id="expiry_date" name="expiry_date" required></td>
        </tr>
        
        <tr><td><button type="submit">Create Item</button></td></tr>
        </table>
    </form>
@endsection