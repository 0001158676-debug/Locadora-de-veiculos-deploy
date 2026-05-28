<?php

namespace App\Http\Controllers;

use App\Models\Aluguel;
use App\Models\Usuario;
use App\Models\Carro;
use Illuminate\Http\Request;

class AluguelController extends Controller
{
    public function index()
    {
        $aluguels = Aluguel::with('usuario','carro')->get();
        return view('aluguels.index', compact('aluguels'));
    }

    public function create()
    {
        $usuarios = Usuario::where('status','ativo')->get();
        $carros = Carro::where('status','disponivel')->get();

        return view('aluguels.create', compact('usuarios','carros'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required',
            'carro_id' => 'required',
            'data_inicio' => 'required|date',
            'data_final_prevista' => 'required|date'
        ]);

        $carro = Carro::find($request->carro_id);

        // REGRA 1: Só cria aluguel se carro estiver disponível
        if ($carro->status != 'disponivel') {
            return back()->with('erro','Carro não disponível!');
        }

        // Criar aluguel
        Aluguel::create($request->all());

        // REGRA 2: Carro vira alugado
        $carro->update([
            'status' => 'alugado'
        ]);

        return redirect()->route('aluguels.index');
    }

    public function edit(Aluguel $aluguel)
    {
        $usuarios = Usuario::all();
        $carros = Carro::all();

        return view('aluguels.edit', compact('aluguel','usuarios','carros'));
    }

    public function update(Request $request, Aluguel $aluguel)
    {
        $request->validate([
            'usuario_id' => 'required',
            'carro_id' => 'required',
            'status' => 'required'
        ]);

        $aluguel->update($request->all());

        // REGRA 3: Se finalizar, carro volta disponível
        if ($request->status == 'finalizado') {

            $aluguel->carro->update([
                'status' => 'disponivel'
            ]);
        }

        return redirect()->route('aluguels.index');
    }

    public function destroy(Aluguel $aluguel)
    {
        // Se excluir aluguel aberto, liberar carro
        if ($aluguel->status == 'aberto') {
            $aluguel->carro->update([
                'status' => 'disponivel'
            ]);
        }

        $aluguel->delete();

        return redirect()->route('aluguels.index');
    }
}
