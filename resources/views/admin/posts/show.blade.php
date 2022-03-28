@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p class="text-white">{{ $post->content }}</p>
    @if($post->image)
    <img src="{{ $post->image }}" alt="{{ $post->slug}}">
    @endif
    <div class="d-flex justify-content-end align-items-center mt-5">
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary"><i class="fa-solid fa-arrow-rotate-left"> TORNA INDIETRO</i></a>
    </div>
</div>

@endsection