@extends('adminlte::page')
@section('title', 'Criar cargo')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Criar um novo acesso</h1>
                <form action="/create-role" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 form-group pb-2">
                            <input type="text" name="name" class="form-control" placeholder="Nome"/>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 form-group pb-2">
                            <input type="text" name="description" class="form-control" placeholder="Descrição"/>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Criar</button>
                </form>
            </div>
        </div>

    </div>

@stop


