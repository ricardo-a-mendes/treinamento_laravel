<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Products</title>
    </head>
    <body>
        <div>
            <ul>
                @foreach($products as $product)
                <li><a href="{{route('productEdit', ['id' => $product->id])}}">{{$product->name}} ({{$product->description}}) - R$ {{number_format($product->price, 2, ',', '.')}}</a></li>
                @endforeach
            </ul>
        </div>
    </body>
</html>