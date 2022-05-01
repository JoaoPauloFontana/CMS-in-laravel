@extends('adminlte::page')

@section('title', 'Nova Página')

@section('content_header')
    <h1>Nova Página: <br></h1>
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

    <div class="card">
        <div class="card-body">
            <form action="{{ route('pages.store') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Título</label>
                    <div class="col-sm-10">
                        <input type="title" class="form-control @error('title') is-invalid @enderror" placeholder="Título" name="title" value="{{ old('title') }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Corpo</label>
                    <div class="col-sm-10">
                        <textarea name="body" class="form-control">{{ old('body') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="submit" value="Adicionar" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
