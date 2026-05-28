<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculadoraController extends Controller
{
    // Função para mostrar a página inicial (GET)
public function index()
{
    return view('calculo');
}

    // Função para processar a conta (POST)
    public function calcular(Request $request)
    {
        $n1 = $request->input('n1');
        $n2 = $request->input('n2');
        $op = $request->input('operacao');
        $resultado = 0;

        switch ($op) {
            case 'soma': $resultado = $n1 + $n2; break;
            case 'sub':  $resultado = $n1 - $n2; break;
            case 'mult': $resultado = $n1 * $n2; break;
            case 'div':  $resultado = ($n2 != 0) ? $n1 / $n2 : "Erro: Divisão por zero"; break;
        }

        // Devolve para a mesma view, mas agora levando o resultado
        return view('calculo', compact('resultado', 'n1', 'n2', 'op'));
    }
}
