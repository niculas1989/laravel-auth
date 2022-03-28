@extends('layouts.app')

@section('content')
<div class="container">
    <header>
        <h1>Nuovo Post</h1>
    </header>
    <hr>
    @if($errors->any())
    <div class="alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('admin.posts.store') }}" method="POST" novalidate>
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="form-group @error('title') is-invalid @enderror">
                    <label for="title" class="text-white">Titolo Post</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-group @error('title') is-invalid @enderror">
                    <label for=" content" class="text-white">Post</label>
                    <textarea class="form-control" id="content" rows="5" name="content"></textarea>
                </div>
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-10">
                <div class="form-group @error('title') is-invalid @enderror">
                    <label for="image" class="text-white">Immagine Post</label>
                    <input type="url" class="form-control" id="image" placeholder="immagine" name="image">
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col 2">
                <img src="http://www.asdalcione.it/wp-content/uploads/2016/08/jk-placeholder-image-1.jpg" alt="placeholder" width=50; class="img-fluid" id="preview">
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-check mr-2"></i>Conferma</button>
        </div>
    </form>
</div>
@endsection

@section('additional-scripts')
<script>
    const placeholder = "http://www.asdalcione.it/wp-content/uploads/2016/08/jk-placeholder-image-1.jpg";

    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('preview');

    imageInput.addEventListener('change', e => {
        const preview = imageInput.value ?? placeholder;
        imagePreview.setAttribute('src', preview);
    })
</script>
@endsection