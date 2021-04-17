@extends('layouts.app')

@section('title', 'Upload images')

@section('content')
    <div class="title m-b-md">
        Upload images
    </div>

    @push('css')
        <link href="{{ asset('css/image-gallery.css') }}" rel="stylesheet">
    @endpush
@endsection
