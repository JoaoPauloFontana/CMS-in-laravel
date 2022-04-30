@extends('adminlte::page')

@section('title', 'Meu Perfil')

@section('content_header')
    <h1>Meu Perfil</h1>
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                <h4>Ocorreu um erro</h4>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('warning'))
    <div class="alert alert-success">
        {{ session('warning') }}
    </div>
    @endif

    <form action="{{ route('profile.save') }}" method="POST" class="form-horizontal">
        @method('PUT')
        @csrf
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nome Completo</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nome Completo"
                    name="name" value="{{ $user->name }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                    name="email" value="{{ $user->email }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nova Senha</label>
            <div class="col-sm-10">
                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Nova Senha"
                    name="password">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Confirmar Senha</label>
            <div class="col-sm-10">
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="Confirmar Senha" name="password_confirmation">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <input type="submit" value="Salvar" class="btn btn-success">
            </div>
        </div>
    </form>
@endsection
