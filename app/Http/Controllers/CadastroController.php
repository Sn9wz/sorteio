<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CadastroController extends Controller
{
    public function index()
    {
        return view('cadastro');
    }

    public function store(request $request)
    {
        $nome = trim($request->input('nome'));

        if (empty($nome)) {
            return redirect('/cadastro')->with('error', 'O nome não pode estar em branco.');
        }

        $path = storage_path('app/participants.json');

        $participants = file_exists($path)
        ? json_decode(file_get_contents($path), true)
        : [];

        foreach ($participants as $p) {
            if (strtollower($p['nome']) === strtolower($nome)) {
                return redirect('/cadastro')->with('error', 'Este nome já foi cadastrado.');
            }
        }

        $newParticipant = [
            'id' => count($participants) + 1,
            'nome' => $nome,
            'data_cadastro' => now()->toISOString()
        ];

        $participants[] = $newParticipant;

        file_put_contents($path, json_encode($participants, JSON_PRETTY_PRINT));

        return redirect('/cadastro')->with('success', 'Participante cadastrado com sucesso!');

    }

}
