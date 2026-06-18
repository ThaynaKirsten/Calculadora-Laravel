<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="UTF-8">
 <title>Calculadora de Fita - Projeto 1</title>
 <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen p-4">
 <div class="bg-gray-800 p-8 rounded-2xl shadow-2xl w-full max-w-md border bordergray-700">
 <h1 class="text-2xl font-bold text-white mb-1 text-center">Calculadora <span
class="text-indigo-500">Contínua</span></h1>
 <p class="text-gray-400 text-xs text-center mb-6">Armazenando estado e
operações no Banco de Dados</p>
 <!-- DISPLAY DE LED -->
 <div class="text-right text-4xl font-mono font-bold text-green-400 mb-6 p-4
bg-gray-950 rounded-xl border border-gray-800 shadow-inner">
 {{ number_format($ultimoAcumulado, 2, ',', '.') }}
 </div>
 @if ($errors->any())
 <div class="bg-red-900/40 border border-red-500/50 text-red-200 p-3
rounded-lg mb-4 text-sm">
 @foreach ($errors->all() as $error)
 <p> {{ $error }}</p>
 @endforeach
 </div>
 @endif
 <!-- FORMULÁRIO COM ENTRADA ÚNICA -->
 <form action="/calcular-continua" method="POST" class="space-y-4">
 @csrf
 <div class="flex gap-2">
 <select name="operacao" class="bg-gray-700 border border-gray-600
rounded-lg p-3 text-white focus:ring-2 focus:ring-indigo-500 font-bold text-lg
cursor-pointer">
 <option value="soma">+</option>
 <option value="sub">-</option>
 <option value="mult">*</option>
 <option value="div">/</option>
 </select>
 <input type="number" name="num" placeholder="Digite o número"
step="any" required autocomplete="off" class="w-full bg-gray-700 border bordergray-600 rounded-lg p-3 text-white placeholder-gray-400 focus:ring-2 focus:ringindigo-500 font-mono text-lg" value="{{ old('num') }}">
 <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3 rounded-lg shadow-lg transition-all duration-300">Aplicar
na Memória</button>
 </form>
 <!-- BOTÃO CLEAR (TRUNCATE) -->
 <form action="/calculadora-continua/limpar" method="POST" class="mt-3">
 @csrf
 <button type="submit" class="w-full bg-gray-700/40 hover:bg-red-600/20
text-gray-400 hover:text-red-400 border border-gray-600/30 font-semibold py-1.5
rounded-lg text-xs transition-all duration-300"> Zerar Memória (Clear Table)</
button>
 </form>
 <!-- FITA DE AUDITORIA HISTÓRICA -->
 <div class="mt-6 border-t border-gray-700 pt-4">
 <h3 class="font-semibold text-xs text-indigo-400 uppercase tracking-wider
mb-3">Histórico da Fita:</h3>
 @if($fita->isEmpty())
 <p class="text-gray-500 text-sm italic text-center py-4">Nenhuma
operação realizada.</p>
 @else
 <div class="space-y-2 max-h-40 overflow-y-auto pr-1 font-mono textsm">
 <div class="flex justify-between text-gray-500 text-xs border-b
border-gray-800 pb-1">
 <span>[Início]</span><span>0,00</span>
 </div>
 @foreach($fita as $linha)
 <div class="flex justify-between py-1 border-b bordergray-800 text-gray-300">
 <span class="text-gray-400">
 @if($linha->operacao == 'soma') <span class="textgreen-500 font-bold">+</span> @endif
 @if($linha->operacao == 'sub') <span class="textred-500 font-bold">-</span> @endif
 @if($linha->operacao == 'mult') <span class="textyellow-500 font-bold">*</span> @endif
 @if($linha->operacao == 'div') <span class="textblue-500 font-bold">/</span> @endif
 {{ number_format($linha->valor, 2, ',', '.') }}
 </span>
 <span class="text-white font-semibold">=
{{ number_format($linha->acumulado, 2, ',', '.') }}</span>
 </div>
 @endforeach
 </div>
 @endif
 </body>
 </html>