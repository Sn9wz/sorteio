<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SorteioController extends Controller
{
    public function index()
    {
        return view('sortear');
    }

    public function sortear(Request $request)
    {
        $path = 'participants.json';
        $participants = json_decode(Storage::disk('local')->get($path), true);

        $sorteados = $request->input('sorteados', []);

        $disponiveis = array_filter($participants, fn($p) => !in_array($p['id'], $sorteados));

        if(empty($disponiveis)) {
            return response()->json(['error' => 'Todos os participantes já foram sorteados!']);
        }

        $winner = $disponiveis[array_rand($disponiveis)];

        return response()->json($winner);
    }
}
