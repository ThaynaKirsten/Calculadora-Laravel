<?php

use Illuminate\Support\Facades\DB;

    public function indexContinua() {
    $fita = DB::table('historico_calculos')->orderBy('id', 'asc')->get();
    $ultimoAcumulado = $fita->last()?->acumulado ?? 0;
   return view('calculadora_continua', compact('fita', 'ultimoAcumulado'));
   }

   public function calcularContinua(Request $request) {
    $dados = $request->validate([
   'num' => 'required|numeric',
   'operacao' => 'required|in:soma,sub,mult,div'
    ], [
   'required' => 'O preenchimento do número é obrigatório!',
   'numeric' => 'Digite exclusivamente números!'
    ]);

        $ultimoRegistro = DB::table('historico_calculos')->orderBy('id', 'desc')->first();
    $acumuladoAnterior = $ultimoRegistro ? $ultimoRegistro->acumulado : 0;
    $novoNumero = $dados['num'];
    $op = $dados['operacao'];
    $novoAcumulado = 0;
    if ($op == 'soma') $novoAcumulado = $acumuladoAnterior + $novoNumero;
    elseif ($op == 'sub') $novoAcumulado = $acumuladoAnterior - $novoNumero;
    elseif ($op == 'mult') $novoAcumulado = $acumuladoAnterior * $novoNumero;
    elseif ($op == 'div') {
    $novoAcumulado = $novoNumero != 0 ? ($acumuladoAnterior / $novoNumero) :
    $acumuladoAnterior;
    }
   
    DB::table('historico_calculos')->insert([
        'valor' => $novoNumero,
        'operacao' => $op,
         => now(),
        return redirect(// 3. Realiza o truncamento (limpeza total) da fita
        public function limparContinua() {
         DB::table(return redirect();
        
>