@extends('layouts.app')

@section('content')
<div class="container">
    <header>
        <h1>I miei posts:</h1>
    </header>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Creato il:</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $p)
            <tr>
                <th scope="row">{{ $p->id }}</th>
                <td>{{ $p->title }}</td>
                <td>{{ $p->slug }}</td>
                <td>@{{ $p->created_at }}</td>
                <td class="d-flex justify-content-end align-items-center">Actions</td>
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