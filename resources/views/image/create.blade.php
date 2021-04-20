@extends('layouts.app')

@section('title', 'Upload images')

@section('content')
    <div class="title m-b-md">
        Upload images
    </div>
    <div class="row justify-content-center">
        <div class="alert alert-success alert-dismissible fade show hidden" role="alert">
            <strong id="message"></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <br>
        <div class="form-group">
            <form id="file-upload-form" class="uploader" action="{{route('image-gallery.store')}}"
                  method="post"
                  accept-charset="utf-8"
                  enctype="multipart/form-data">
                @csrf
                <label for="file-input">
                    Allowed format - .jpeg, .jpg, .png, .jfif, .pjpeg, .pjp. Max size 2 mb.
                </label>
                <div class="input-group">
                    <input class="form-control" type="file" id="file-input" name="image[]" multiple
                           accept="image/png,image/jpg,image/jpeg"/>
                    <button id="clear-files" type="button" class="btn bg-transparent clear-input">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <label id="file-input-error" class="error" for="file-input"></label>
                <span class="text-danger">{{ $errors->first('image') }}</span>
                <div id="thumb-output">
                    <div class="row"></div>
                </div>
                <br>
                <div class="alert alert-danger hidden" id="upload-error">
                </div>
                <button type="submit" id="multiple-upload" class="btn btn-success">Upload</button>
            </form>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
        <script src="{{ asset('js/image-create.js') }}" defer></script>
    @endpush

    @push('css')
        <link href="{{ asset('css/image-create.css') }}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    @endpush

@endsection
