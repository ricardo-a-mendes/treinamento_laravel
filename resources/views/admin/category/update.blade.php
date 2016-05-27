@extends('base')
@section('content')
    <div class="content">
        <div class="row">
            <h1>Categories Form</h1>

            @if ($errors)
                <ul class="alert">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif

            {!! Form::open(['route' => ['categoryUpdate', $category->id], 'method' => 'PUT']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', $category->name, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description') !!}
                {!! Form::textarea('description', $category->description, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>


            {!! Form::close() !!}
        </div>
    </div>
@endsection