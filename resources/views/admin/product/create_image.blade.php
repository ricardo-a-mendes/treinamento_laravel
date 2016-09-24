@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Image Form</h1>

            @if ($errors)
                <ul class="alert">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif

            {!! Form::open(['route' => ['productImagesStore', $product->id], 'method' => 'POST', 'enctype'=>"multipart/form-data"]) !!}
            <div class="form-group">
                {!! Form::label('image', 'Image') !!}
                {!! Form::file('image', null, ['class' => 'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::submit('Upload Image', ['class' => 'btn btn-primary form-control']) !!}
            </div>


            {!! Form::close() !!}
        </div>
    </div>
@endsection