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
        $replyMessage = "👋 Welcome!\n\nWould you like to receive information about:\n1. News 📰\n2. Drivers 🏎️\n3. Teams 🏁";
        $telegramService->sendMessage($chatId, $replyMessage, 'Markdown'); // Enviando com formatação Markdown
    } elseif ($messageText == '1') {
        // Obter as notícias do banco de dados
        $noticias = News::all(); // Obtém todas as notícias

        // Mensagem inicial
        $telegramService->sendMessage($chatId, "Here are the latest news from Formula 1:", 'Markdown');

        foreach ($noticias as $noticia) {
            // Construindo a mensagem de cada notícia individualmente
            $replyMessage = "📰 *Title:* {$noticia->titulo}\n\n";
            $replyMessage .= "*Type:* {$noticia->tipo}\n\n";
            $replyMessage .= "*Description:* {$noticia->descricao}\n\n";
            $replyMessage .= "*Link:* [click here]({$noticia->link})"; // Link formatado em Markdown

            // Enviando cada notícia como uma mensagem separada
            $telegramService->sendMessage($chatId, $replyMessage, 'Markdown');
        }
    } elseif ($messageText == '2') {
        // Obter os pilotos do banco de dados
        $pilotos = Driver::orderBy('temporada')->get(); // Obtém todos os pilotos e ordena pela temporada
        $groupedPilots = $pilotos->groupBy('temporada'); // Agrupando por temporada

        $replyMessage = "Here are the drivers from Formula 1:\n\n"; // Adicionando quebra de linha
        foreach ($groupedPilots as $temporada => $grupo) {
            $replyMessage .= "🏎️ Season: {$temporada}\n"; // Mostrando a temporada uma vez
            
            // Ordenando os pilotos pela posição
            $ordenedPilots = $grupo->sortBy('posicao');

            foreach ($ordenedPilots as $piloto) {
                $replyMessage .= "   Name: {$piloto->nome}\n";
                $replyMessage .= "   Position: {$piloto->posicao}\n";
                $replyMessage .= "   Points: {$piloto->pontuacao}\n\n";
            }
        }
        $telegramService->sendMessage($chatId, $replyMessage, 'Markdown');
    } elseif ($messageText == '3') {
        // Obter as equipes do banco de dados
        $equipes = Equipe::orderBy('temporada')->get(); // Obtém todas as equipes e ordena pela temporada
        $groupedTeams = $equipes->groupBy('temporada'); // Agrupando por temporada

        $replyMessage = "Here are the teams from Formula 1:\n\n"; // Adicionando quebra de linha
        foreach ($groupedTeams as $temporada => $grupo) {
            $replyMessage .= "🏁 Season: {$temporada}\n"; // Mostrando a temporada uma vez
            
            // Ordenando as equipes pela posição
            $ordenedTeams = $grupo->sortBy('posicao');

            foreach ($ordenedTeams as $equipe) {
                $replyMessage .= "   Position: {$equipe->posicao}\n";
                $replyMessage .= "   Team Name: {$equipe->nome}\n";
                $replyMessage .= "   Points: {$equipe->pontuacao}\n\n"; // Adicionando quebra de linha
            }
        }
        $telegramService->sendMessage($chatId, $replyMessage, 'Markdown');
    } else {
        // Mensagem padrão para opções não reconhecidas
        $telegramService->sendMessage($chatId, "🚫 Sorry, invalid option. Please choose 1, 2, or 3.", 'Markdown');
    }

    return response()->json(['status' => 'success']);
});
