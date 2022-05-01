@extends('adminlte::page')

@section('title', 'Páginas')

@section('content_header')
    <h1>
        Minhas Páginas: <br>
        <a href="{{ route('pages.create') }}" class="btn btn-sm btn-success">Nova Página</a>
    </h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Ações</th>
                </tr>
                @foreach ($pages as $page)
                    <tr>
                        <th>{{ $page->id }}</th>
                        <th>{{ $page->title }}</th>
                        <th>
                            <a href="{{ route('pages.edit', ['page' => $page->id]) }}"
                                class="btn btn-sm btn-info">Editar</a>
                            <form class="d-inline" action="{{ route('pages.destroy', ['page' => $page->id]) }}"
                                method="POST" onsubmit="return confirm('Tem certeza que deseja excluir essa página?')">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    {{ $pages->links('pagination::bootstrap-4') }}

@endsection
