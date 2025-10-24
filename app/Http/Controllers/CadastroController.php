<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CadastroController extends Controller
{
    public function index()
    {
        return view('cadastro');
    }

    public function store(Request $request)
    {
        $nome = trim($request->input('nome'));

        if (empty($nome)) {
         return redirect('/cadastro')->with('error', 'O nome não pode estar em branco.');
        }

        $path = 'participants.json';

        if (Storage::disk('local')->exists($path)) {
            $participants = json_decode(Storage::disk('local')->get($path), true);
        } else {
            $participants = [];
        }
        
        $normalizedNome = Str::lower(Str::ascii($nome));

        foreach ($participants as $p) {
            $normalizedExisting = Str::lower(Str::ascii($p['nome']));
            if ($normalizedExisting === $normalizedNome) {
                return redirect('/cadastro')->with('error', 'Este nome já foi cadastrado.');
            }
        }

        $newParticipant = [
            'id' => count($participants) + 1,
            'nome' => $nome,
            'data_cadastro' => now()->toISOString()
        ];

        $participants[] = $newParticipant;

        Storage::disk('local')->put($path, json_encode($participants, JSON_PRETTY_PRINT));

        return redirect('/cadastro')->with('success', 'Participante cadastrado com sucesso!');
}

}
