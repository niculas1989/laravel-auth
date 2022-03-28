@extends('layouts.app')

@section('content')
<div class="container">
    <header>
        <h1>Nuovo Post</h1>
    </header>
    <hr>

    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-check"></i>Conferma</button>
        </div>
    </form>
</div>
@endsection

@section('additional-scripts')
<!-- vediamo dopo -->
@endsection