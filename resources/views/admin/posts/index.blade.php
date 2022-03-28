@extends('layouts.app')

@section('content')
<div class="container">
    <header>
        <div class="d-flex justify-content-between align-items-center">
            <h1>I miei posts:</h1>
            <button class="btn btn-success">
                <i class="fa-solid fa-plus"> Nuovo Post</i>
            </button>
        </div>
    </header>

    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Creato il:</th>
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
                <td class="d-flex justify-content-center align-items-center">
                    <button type="button" class="btn btn-primary mr-3"><i class="fa-solid fa-pencil"></i></button>
                    <a href="{{ route('admin.posts.show', $p->id) }}" class="btn btn-warning mr-3"><i class="fa-solid fa-eye"></i></a>
                    <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
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