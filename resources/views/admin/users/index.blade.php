@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Meus Usuários:</h1>
@endsection

@section('content')
    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <th>{{ $user->id }}</th>
                <th>{{ $user->name }}</th>
                <th>{{ $user->email }}</th>
                <th>
                    <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-sm btn-info">Editar</a>
                    <a href="{{ route('users.destroy', ['user' => $user->id]) }}" class="btn btn-sm btn-danger">Excluir</a>
                </th>
            </tr>
        @endforeach
    </table>
@endsection
