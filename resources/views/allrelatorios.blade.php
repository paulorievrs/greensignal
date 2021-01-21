@section('title', 'Todos os relatórios')
@extends('adminlte::page')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Todos os relatórios</h1>
                <table id="relatorios-table" class="display nowrap dataTable dtr-inline" style="width:100%">
                    <thead>
                    <tr>
                        <th>PRODUTO</th>
                        <th>EAN</th>
                        <th>DESCRIÇÃO</th>
                        <th>FORNECEDOR</th>
                        @foreach($vendarelatorios as $venda)
                            <th>{{ $venda->mesesAno }}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($relatorios as $relatorio)
                    <tr>
                        <td>{{ $relatorio->produto->codigoDoProduto }}</td>
                        <td>{{ $relatorio->produto->ean }}</td>
                        <td>{{ $relatorio->descricao }}</td>
                        <td>{{ $relatorio->fornecedor->name }}</td>
                        @foreach($vendarelatorios as $venda)
                            <th>{{ $venda->valorTotal }}</th>
                        @endforeach
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#relatorios-table').DataTable({
                responsive: true
            });
        } );
    </script>
@stop

