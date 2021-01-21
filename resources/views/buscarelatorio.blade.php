@extends('adminlte::page')
@section('title', 'Buscar relatório')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Buscar relatório</h1>
                <form action="/relatorios" method="GET">
                    <div class="form-row">
                        <div class="col-md-12 form-group">
                            <label for="tipoDeRelatorio">Tipo de relatório</label>
                            <select class="custom-select" name="tipoDeRelatorio">
                                <option value="Quantidade vendida">Quantidade Vendida</option>
                                <option value="Valor vendido">Valor Vendido</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 form-group">
                            <label for="filial">Indústria</label>
                            <select class="custom-select" name="filial">
                                @foreach($fornecedores as $fornecedor)
                                    <option value="{{ $fornecedor->id }}">{{ $fornecedor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 form-group">
                            <label for="filial">Unidade</label>
                            <select class="custom-select" name="filial">
                                @foreach($filiais as $filial)
                                    <option value="{{ $filial->id }}">{{ $filial->name . ' - ' . $filial->uf }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <label for="data-inicio">Data Início</label>
                            <input type="date" name="data-inicio" class="form-control" />
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="data-fim">Data Fim</label>
                            <input type="date" name="data-fim" class="form-control" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </form>
            </div>
        </div>

    </div>

@stop


