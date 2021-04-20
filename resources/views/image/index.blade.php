@extends('layouts.app')

@section('title', 'Gallery')

@section('content')
    <div class="title m-b-md">
        Gallery
    </div>
    <form id="filter-form" action="{{ route('image-gallery.index') }}">
        <div class="input-group mb-3">
            <input type="text" name="tag" class="form-control" id="filter-input" placeholder="Filter by tag"
                   aria-label="Filter by tag" aria-describedby="filter-by-tag"
                   value="{{ $filterQuery }}">
            <div class="input-group-append">
                <button id="clear-filter" type="button" class="btn bg-transparent clear-input">
                    <i class="fa fa-times"></i>
                </button>
                <button class="btn btn-outline-secondary" type="submit" id="filter-by-tag">Search</button>
            </div>
        </div>
    </form>
    <div class="row">
        @forelse($images as $image)
            <div class="col-lg-4 col-md-12 mb-5 mb-lg-5">
                <div class='text-center'>
                    <h5>
                        <strong>
                            {{ $image->title }}
                        </strong>
                    </h5>
                </div>
                <img src="{{ asset($image->path) }}" class="w-100 shadow-1-strong rounded" alt=""/>
                <div class='text-center'>
                    @foreach($image->tags as $tag)
                        <small class='text-muted'>
                            <u>{{ '#' . $tag->name }}</u>
                        </small>
                    @endforeach
                </div>
            </div>
        @empty
            <p> Gallery is empty </p>
        @endforelse

        {{ $images->links() }}
    </div>

    @push('scripts')
        <script src="{{ asset('js/image-gallery.js') }}" defer></script>
    @endpush

@endsection
