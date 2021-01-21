<?php

namespace App\Imports;

use App\Models\Fornecedor;
use App\Models\Produto;
use App\Models\Relatorio;
use App\Models\VendaRelatorio;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;


class RelatoriosImport implements ToCollection
{

    protected  $filial_id;

    public function __construct($filial_id)
    {
        $this->filial_id = $filial_id;
    }
    /**
     * @param array $row
     *
     * @return Relatorio
     */
    public function collection(Collection $rows)
    {
        ini_set('max_execution_time', 300);

        for ($i = 1; $i < sizeof($rows); $i++) {
            $relatorio = new Relatorio();
            $relatorio->codigoDoProduto = ($this->findOrCreateProduct($rows[$i][0], $rows[$i][1]));
            $relatorio->fornecedor_id = $this->findOrCreateFornecedor($rows[$i][3]);
            $relatorio->descricao = $rows[$i][2];
            $relatorio->filial_id = $this->filial_id;
            $relatorio->user_id = Auth::user()->id;
            $relatorio->save();
            for ($j = 4; $j < sizeof($rows[0]); $j++) {

                if ($rows[$i][$j] === '-' || $rows[$i][$j] === null) {
                    $rows[$i][$j] = 0;
                }
                try {
                    $vendarelatorio = new VendaRelatorio();
                    $vendarelatorio->relatorio_id = $relatorio->id;
                    $vendarelatorio->mesesAno = $this->getTheDateOfTheSell($rows, $j);
                    $vendarelatorio->valorTotal =  $rows[$i][$j];
                    $vendarelatorio->save();
                } catch (\Exception $e) {
                    dd([$e, $rows[$i], $relatorio->id, $this->getTheDateOfTheSell($rows, $j), $rows[$i][$j] ]);
                }
            }
        }
    }

    private function getTheDateOfTheSell($rows, $key)
    {
        if ($key >= 4) {
            return ($rows[0][$key]);
        }
    }

    private function findOrCreateProduct($codigoDoProduto, $ean)
    {
        try {

            $produto = Produto::where('codigoDoProduto', $codigoDoProduto)->firstOrCreate([
                'codigoDoProduto' => $codigoDoProduto,
                'ean'             => $ean
            ]);
            $produto->save();
            return $produto->codigoDoProduto;

        } catch (\Exception $e) {
            dd($e);
        }
    }

    private function findOrCreateFornecedor($name)
    {
        try {
            $fornecedor = Fornecedor::where('name', $name)->firstOrCreate([
                'name'  => $name,
                'cnpj'  => 0
            ]);
            $fornecedor->save();
            return $fornecedor->id;

        } catch (\Exception $e) {
            dd($e);
        }
    }



}
