<?php

namespace App\Http\Controllers;

use App\Imports\RelatoriosImport;
use App\Models\Filiais;
use App\Models\Fornecedor;
use App\Models\Relatorio;
use App\Models\VendaRelatorio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function index(Request $request)
    {
        $filial = $request->query('filial');

        $relatorios = Relatorio::where('filial_id', $filial)->get();
        $vendarelatorios = DB::table('vendarelatorio')->select('*')->paginate(10);

        return view('allrelatorios', [
            'relatorios'     => $relatorios,
            'vendarelatorios' => $vendarelatorios
        ]);
    }

    public function create()
    {
        $filiais = Filiais::all();
        return view('admin.insertExcel', [
            'filiais' => $filiais,
        ]);
    }

    public function searchRelatorio()
    {
        $fornecedores = Fornecedor::all();
        $filiais = Filiais::all();

        return view('buscarelatorio', [
            'filiais'      => $filiais,
            'fornecedores' => $fornecedores
        ]);
    }

    public function importData(Request $request)
    {
        $dateTime = date('Ymd_His');
        $file = $request->file('file');
        $fileName = $dateTime . '-' . $file->getClientOriginalName();
        $savePath = public_path('/upload/');
        $file->move($savePath, $fileName);

        Excel::import(new RelatoriosImport($request->filial_id), $savePath . $fileName);
        File::delete($savePath . $fileName);
    }

}
