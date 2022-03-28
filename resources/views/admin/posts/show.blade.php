@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p class="text-white">{{ $post->content }}</p>
    @if($post->image)
    <img src="{{ $post->image }}" alt="{{ $post->slug}}">
    @endif
    <div class="d-flex justify-content-end align-items-center mt-5">
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary mr-2"><i class="fa-solid fa-arrow-rotate-left"> TORNA INDIETRO</i></a>
        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post" id="delete-form">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash mr-2"></i>ELIMINA</button>
        </form>
    </div>
</div>
@endsection

@section('additional-scripts')
<script>
    const deleteForm = document.getElementById('delete-form');
    deleteForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const confirmation = confirm('Sei sicuro di voler eliminare il post?');
        if (confirmation) e.target.submit();
    })
</script>
@endsection