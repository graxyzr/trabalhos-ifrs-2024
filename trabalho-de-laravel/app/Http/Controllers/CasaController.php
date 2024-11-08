<?php

// app/Http/Controllers/CasaController.php

namespace App\Http\Controllers;

use App\Models\Casa;
use Illuminate\Http\Request;

class CasaController extends Controller
{
    public function index()
    {
        $casas = Casa::all();
        return view('casas.index', compact('casas'));
    }

    public function create()
    {
        return view('casas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_imobiliaria' => 'required',
            'endereco' => 'required',
            'preco' => 'required|numeric',
            'venda_ou_aluguel' => 'required|boolean',
        ]);

        Casa::create($request->all());

        return redirect()->route('casas.index')->with('success', 'Casa criada com sucesso!');
    }

    public function show($id)
    {
        $casa = Casa::findOrFail($id);
        return view('casas.show', compact('casa'));
    }

    public function edit($id)
    {
        $casa = Casa::findOrFail($id);
        return view('casas.edit', compact('casa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome_imobiliaria' => 'required',
            'endereco' => 'required',
            'preco' => 'required|numeric',
            'venda_ou_aluguel' => 'required|boolean',
        ]);

        $casa = Casa::findOrFail($id);
        $casa->update($request->all());

        return redirect()->route('casas.index')->with('success', 'Casa atualizada com sucesso!');
    }

    public function destroy($id)
    {
        Casa::destroy($id);
        return redirect()->route('casas.index')->with('success', 'Casa deletada com sucesso!');
    }

    public function maisCara()
    {
        $casa = Casa::orderBy('preco', 'desc')->first();

        return view('casas.show', compact('casa'));
    }


    public function filtro($tipo)
    {
        // Filtra as casas com base no tipo de negócio (0 para aluguel, 1 para venda)
        $casas = Casa::where('venda_ou_aluguel', $tipo)->get();

        // Define o texto do tipo (Aluguel ou Venda)
        $tipoTexto = $tipo == 0 ? 'Aluguel' : 'Venda';

        // Retorna a view 'casas.filtro' com as casas filtradas e o tipo de texto
        return view('casas.filtro', compact('casas', 'tipoTexto'));
    }

    public function ordenar($campo)
    {
        $casas = Casa::orderBy($campo)->get();
        return view('casas.index', compact('casas'));
    }

    public function buscar(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            return redirect()->route('casas.index')->with('error', 'A busca não pode ser vazia.');
        }

        $casas = Casa::where('endereco', 'like', "%{$query}%")
            ->orWhere('nome_imobiliaria', 'like', "%{$query}%")
            ->get();

        return view('casas.buscar', compact('casas', 'query'));
    }


}