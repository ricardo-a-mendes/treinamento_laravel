<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Categories</title>
    </head>
    <body>
        <div>
            <ul>
                @foreach($categories as $category)
                <li><a href="{{route('categoryEdit', ['id' => $category->id])}}">{{$category->name}} ({{$category->description}})</a></li>
                @endforeach
            </ul>
        </div>
    </body>
</html>