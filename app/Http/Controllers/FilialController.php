<?php

namespace App\Http\Controllers;

use App\Models\Filiais;
use Illuminate\Http\Request;

class FilialController extends Controller
{
    public function create()
    {
        return view('admin.create-filial');
    }

    public function store(Request $request)
    {
        try {
            $filial         = new Filiais();
            $filial->name   =  $request->name;
            $filial->estado = $request->estado;
            $filial->uf     = $request->uf;
            $filial->save();

            return redirect('/create-filial')->with(['response' => 'Criado filial com sucesso!']);
        } catch (\Exception $e) {
            return redirect('/create-filial')->with(['error' => 'Erro ao criar filial!']);
        }

    }
}
