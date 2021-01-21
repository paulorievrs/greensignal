@section('title', 'Importar Excel')
@extends('adminlte::page')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Selecione um arquivo excel</h1>
                <form action="/import-excel" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12 form-group pb-2">
                            <select class="custom-select" name="filial_id">
                                    <option>Selecione a unidade</option>
                                @foreach($filiais as $filial)
                                    <option {{ $filial->id }}>{{ $filial->name . ' - ' . $filial->uf }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-12 form-group pb-2">
                             <input type="file" name="file" id="file" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>

@stop


