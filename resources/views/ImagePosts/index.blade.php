@extends('layout')

@section('title', 'Home')

@section('content')
    @parent
    <div class="image-grid">
        <div class="row">
            @foreach($posts as $post)
                <div class="col-"
            @endforeach
        </div>
    </div>
@endsection