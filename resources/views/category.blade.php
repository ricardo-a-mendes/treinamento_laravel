<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div>
            <ul>
                @foreach($categories as $category)
                <li>{{$category->name}} ({{$category->description}})</li>
                @endforeach
            </ul>
        </div>
    </body>
</html>