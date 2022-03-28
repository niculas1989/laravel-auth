@extends('layouts.app')

@section('content')
<div class="container">
    <header>
        <div class="d-flex justify-content-between align-items-center">
            <h1>I miei posts:</h1>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-success">
                <i class="fa-solid fa-plus"> Nuovo Post</i>
            </a>
        </div>
        <hr>
    </header>
    @if(session('messages'))
    <div class="alert alert-{{ session('type') ?? 'info' }}">
        {{ session('message') }}
    </div>
    @endif

    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Creato il:</th>
                <th scope="col">Modificato il:</th>
                <th scope="col" class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $p)
            <tr>
                <th scope="row">{{ $p->id }}</th>
                <td>{{ $p->title }}</td>
                <td>{{ $p->slug }}</td>
                <td>{{ $p->created_at }}</td>
                <td>{{ $p->updated_at }}</td>
                <td class="d-flex justify-content-center align-items-center">
                    <a href="{{ route('admin.posts.edit', $p->id) }}" class="btn btn-primary mr-3"><i class="fa-solid fa-pencil"></i></a>
                    <a href="{{ route('admin.posts.show', $p->id) }}" class="btn btn-warning mr-3"><i class="fa-solid fa-eye"></i></a>
                    <form action="{{ route('admin.posts.destroy', $p->id) }}" method="post" class="delete-form">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">Non ci sono posts da visualizzare.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection

@section('additional-scripts')
<script src="{{ asset('js/delete-confirm.js') }}"></script>
@endsection