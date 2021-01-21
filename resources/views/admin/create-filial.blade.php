@extends('adminlte::page')
@section('title', 'Criar unidade')
@section('content')
    <div class="container">
        @if(session('response') !== null)
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-primary" role="alert">
                    {{ session('response') }}
                </div>
            </div>
        </div>
        @endif

        @if(session('error') !== null)
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                </div>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <h1>Criar nova unidade</h1>
                <form action="/create-unidade" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 form-group pb-2">
                            <input type="text" name="name" class="form-control" placeholder="Nome"/>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 form-group pb-2">
                            <input type="text" name="estado" class="form-control" placeholder="Estado"/>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12 form-group pb-2">
                            <input type="text" name="uf" class="form-control" placeholder="UF"/>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Criar</button>
                </form>
            </div>
        </div>

    </div>

@stop


