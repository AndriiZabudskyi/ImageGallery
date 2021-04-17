<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('home') }}">N-iX test task Laravel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="{{ route('home') }}">Home</a>
                <a class="nav-item nav-link" href="{{ route('image-gallery.index') }}">Gallery</a>
                <a class="nav-item nav-link" href="{{ route('image-gallery.create') }}">Upload images</a>
            </div>
        </div>
    </nav>
</header>