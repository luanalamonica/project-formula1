<?php

use App\Http\Controllers\PilotoController;
use App\Models\Driver; // Certifique-se de que este é o modelo correto
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Services\TelegramService; // Importando o TelegramService
use App\Models\News; // Importando o modelo News
use App\Models\Piloto; // Importando o modelo Piloto
use App\Models\Equipe; // Importando o modelo Equipe
use Illuminate\Support\Facades\Log; // Importando Log

/*
|-------------------------------------------------------------------------- 
| API Routes 
|-------------------------------------------------------------------------- 
| 
| Here is where you can register API routes for your application. These 
| routes are loaded by the RouteServiceProvider within a group which 
| is assigned the "api" middleware group. Enjoy building your API! 
| 
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Adicionando a rota do webhook do Telegram
Route::post('/webhook', function (Request $request) {
    Log::info('Webhook recebido', ['request' => $request->all()]); // Log de toda a requisição
    $telegramService = new TelegramService();

    // Capturando o chat_id do usuário quando ele enviar uma mensagem
    $chatId = $request->input('message.chat.id'); // Capturando o chat ID
    $messageText = $request->input('message.text');

    // Aqui você pode implementar a lógica de resposta do bot
    if ($messageText === '/start') {
        $replyMessage = "Bem-vindo! Você deseja receber informações sobre:\n1. Notícias\n2. Pilotos\n3. Equipes";
        $telegramService->sendMessage($chatId, $replyMessage);
    } elseif ($messageText == '1') {
        // Obter as notícias do banco de dados
        $noticias = News::all(); // Obtém todas as notícias
        $replyMessage = "Aqui estão as últimas notícias da Fórmula 1:\n";
        foreach ($noticias as $noticia) {
            $replyMessage .= "- {$noticia->titulo}\n"; // Substitua 'titulo' pela coluna que você usa para armazenar o título da notícia
        }
        $telegramService->sendMessage($chatId, $replyMessage);
    } elseif ($messageText == '2') {
        // Obter os pilotos do banco de dados
        $pilotos = Driver::all(); // Obtém todos os pilotos
        $replyMessage = "Aqui estão os pilotos da Fórmula 1:\n";
        foreach ($pilotos as $piloto) {
            $replyMessage .= "- {$piloto->nome}\n"; // Verifique se a coluna 'nome' existe
        }
        $telegramService->sendMessage($chatId, $replyMessage);
    } elseif ($messageText == '3') {
        // Obter as equipes do banco de dados
        $equipes = Equipe::all(); // Obtém todas as equipes
        $replyMessage = "Aqui estão as equipes da Fórmula 1:\n";
        foreach ($equipes as $equipe) {
            $replyMessage .= "- {$equipe->nome}\n"; // Substitua 'nome' pela coluna que você usa para armazenar o nome da equipe
        }
        $telegramService->sendMessage($chatId, $replyMessage);
    } else {
        // Mensagem padrão para opções não reconhecidas
        $telegramService->sendMessage($chatId, "Desculpe, opção inválida. Por favor, escolha 1, 2 ou 3.");
    }

    return response()->json(['status' => 'success']);
});
