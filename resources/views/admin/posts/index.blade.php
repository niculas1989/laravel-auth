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
                    <button type="button" class="btn btn-primary mr-3">MODIFICA</button>
                    <button type="button" class="btn btn-danger">ELIMINA</button>
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