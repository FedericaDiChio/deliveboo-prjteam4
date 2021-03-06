<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5 mb-5">
        <form action="{{route('orders.update', $order)}}"
        method="post">
            @csrf
            @method('PUT')

            <label for="address">Indirizzo</label>
            <input type="text" name="address" id="address" value="{{$order->address}}">
        
            <label for="user_name">User Name</label>
            <input type="text" name="user_name" id="user_name"  value="{{$order->user_name}}">
        
            <label for="user_surname">User Surname</label>
            <input type="text" name="user_surname" id="user_surname"  value="{{$order->user_surname}}">
        
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone"  value="{{$order->phone}}">
        
            <label for="email">Email</label>
            <input type="text" name="email" id="email"  value="{{$order->email}}">
        
            <label for="total">totale</label>
            <input type="text" name="total" id="total"  value="{{$order->total}}">

            <div class="mb-2 mt-2">
                <button type="submit" class="btn btn-outline-success">conferma modifiche</button>
            </div>
            <div class="mb-2 mt-2"><a href="{{route('orders.index')}}" class="btn btn-outline-primary">torna all'indice</a></div>
        </form>
    </div>
</body>
</html>