@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>
        Meus Usuários: <br>
        <a href="{{ route('users.create') }}" class="btn btn-sm btn-success">Novo Usuário</a>
    </h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.edit', ['user' => $user->id]) }}"
                                class="btn btn-sm btn-info">Editar</a>
                            @if ($loggedId !== intval($user->id))
                                <form class="d-inline" action="{{ route('users.destroy', ['user' => $user->id]) }}"
                                    method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esse usuário?')">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-danger">Excluir</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    {{ $users->links('pagination::bootstrap-4') }}

@endsection
