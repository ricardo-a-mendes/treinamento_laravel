<!DOCTYPE html>
<html>
    <head>
        <title>Products</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div>
            <ul>
                @foreach($products as $product)
                <li>{{$product->name}} ({{$product->description}}) - R$ {{number_format($product->price, 2, ',', '.')}}</li>
                @endforeach
            </ul>
        </div>
    </body>
</html>