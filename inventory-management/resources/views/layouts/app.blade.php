<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Inventory Managment System')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
        }
        nav {
            margin: 10px 0;
        }
        .navigation {
        	margin: 20px 0;
        }

        .nav-button {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            text-decoration: none;
            color: white; 
            background-color: #007bff; 
            border-radius: 5px; 
            transition: background-color 0.3s ease; 
        }

        .nav-button:hover {
            background-color: #0056b3; 
            color: white;
        }
        .nav-button.active {
            background-color: black; 
            color: white; 
        }
        main {
            padding: 20px;
        }
        footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }
        .bold-border {
            border-collapse: collapse; 
            width: 50%; 
        }

        .bold-border th, .bold-border td {
            border: 2px solid black; 
            padding: 8px; 
            text-align: left; 
        }

        .bold-border th {
            background-color: #f2f2f2; 
        }
    </style>

    
</head>
<body>
    <header>
        <h1>Inventory Managment System</h1>
        <div class="navigation">
        <a href="{{ route('items.index') }}" class="nav-button {{ request()->routeIs('items.index') ? 'active' : '' }}">Home</a>
        <a href="{{ route('items.create') }}" class="nav-button {{ request()->routeIs('items.create') ? 'active' : '' }}">Add Item</a>
        </div>
    </header>
    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} My Application</p>
    </footer>
</body>
</html>