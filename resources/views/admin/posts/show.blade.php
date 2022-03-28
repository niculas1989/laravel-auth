@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p class="text-white">{{ $post->content }}</p>
    @if($post->image)
    <img src="{{ $post->image }}" alt="{{ $post->slug}}">
    @endif
</div>
@endsection