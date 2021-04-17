@extends('layouts.app')

@section('content')
    <div class="title m-b-sm">
        Welcome to Image Gallery
    </div>
    <div class="btn-group-vertical">
        <a class="btn btn-primary btn-lg btn-block" href="{{ route('image-gallery.index') }}" role="button">Go to gallery</a>
        <a class="btn btn-secondary btn-lg btn-block" href="{{ route('image-gallery.create') }}" role="button">Upload images</a>
    </div>

@endsection
