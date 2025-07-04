<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colaborador;
use Illuminate\Database\Facades\QueryException;
use Illuminate\Support\Facades\Validator;

class ColaboradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colaboradores = Colaborador::all();

        return view('list-colaboradores', compact('colaboradores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create-colaboradores');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // Defina as regras de validação
        $rules = [
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:colaboradores,email',
            'telefone' => ['reuqired', 'regex://^\(\d{2}\) \d{4,5}-\d{4}$/'],
            'logradouro' => 'required|string|max:255',
            'numero' => 'required|integer',
            'municipio' => 'required|string|max:255',
            'estado' => 'required|string|size:2',
            'cargo' => 'required|string|max:255',
        ];

        $messages = [
            'nome.required' => 'O campo nome é obrigatório',
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'E-mail informado não é válido',
            'email.unique' => 'E-mail já cadastrado',
            'telefone.required' => 'O campo telefone é obrigatório',
            'telefone.regex' => 'Telefone informado não é válido o telefone deve estar no formato (99) 99999-9999.',
            'logradouro.required' => 'O campo logradouro é obrigatório',
            'numero.required' => 'O campo número é obrigatório',
            'numero.integer' => 'O campo número deve ser um número inteiro.',
            'municipio.required' => 'O campo municipio é obrigatório',
            'estado.required' => 'O campo estado é obrigatório',
            'estado.size' => 'O campo estado deve ter exatament 2 cracteres.',
            'cargo.required' => 'O campo cargo é obrigatório',
        ];

        // Criar o validador
        $validator = Validator::make($data, $rules, $messages);

        // Verificar se a validação falhou.
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $colaborador = Colaborador::create($data);
            return redirect()->route('colaborador.list')->with('msg', 'Colaborador $colaborador->nome foi incluido com sucesso!');
        } catch (QueryException $e) {
            // Verifique se o erro é de chave
            if ($e->errorInfo[1] == 1062) {
                return redirect()->back()->with('msg', 'O e-mail informado já esta cadastrado!')->with('msg_type', 'error');
            }

            // Veirfique se o eero é de coluna obrigatória
            else if ($e->errorInfo[1] == 1048) {
                // Extrtaia o nome da coluna que está vazia
                preg_match("/Column '(.*?)'/", $e->getMessage(), $matches);
                $columnName = $matches[1] ?? 'um campo obrigatório';

                return redirect()->back()->with('msg', "O campo '${columnName}' é obrigatório")->with('msg_type', 'error');
            }

            // Verifique se o erro é de coluna obrigatória
            else if ($e->errorInfo[1] == 1406) {
                // Extraia o nome da coluna que está vazia
                preg_match("/Data too long for column '(.*?)'/", e->getMessage(), $matches);
                $columnName = $matches[1] ?? 'um campo obrigatório';

                return redirect()->back()->with('msg', "O campo '${columnName}' excede o tamanho permitido!")->with('msg_type', 'error');
            }

            // Caso outro erro ocorra
            return redirect()->back()->with('msg', 'Erro ao incluir colaborador')->with('msg_type', 'error');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $colaborador = Colaborador::findOrFail($id);
        return view('colaborador.show', compact('colaborador'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
