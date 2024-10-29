<?php

use App\Http\Controllers\PilotoController;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Services\TelegramService;
use App\Models\News;
use App\Models\Piloto;
use App\Models\Equipe;
use Illuminate\Support\Facades\Log;

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

Route::post('/webhook', function (Request $request) {
    Log::info('Webhook recebido', ['request' => $request->all()]);
    $telegramService = new TelegramService();

    $chatId = $request->input('message.chat.id');
    $messageText = $request->input('message.text');

    if ($messageText === '/start') {
        $replyMessage = "👋 Welcome!\n\nWould you like to receive information about:\n1. News 📰\n2. Drivers 🏎️\n3. Teams 🏁";
        $telegramService->sendMessage($chatId, $replyMessage, 'Markdown');
    } elseif ($messageText == '1') {
        $noticias = News::all();

        $telegramService->sendMessage($chatId, "Here are the latest news from Formula 1:", 'Markdown');

        foreach ($noticias as $noticia) {
            $replyMessage = "📰 *Title:* {$noticia->titulo}\n\n";
            $replyMessage .= "*Type:* {$noticia->tipo}\n\n";
            $replyMessage .= "*Description:* {$noticia->descricao}\n\n";
            $replyMessage .= "*Link:* [click here]({$noticia->link})";

            $telegramService->sendMessage($chatId, $replyMessage, 'Markdown');
        }
    } elseif ($messageText == '2') {
        $pilotos = Driver::orderBy('temporada')->get();
        $groupedPilots = $pilotos->groupBy('temporada');
        $replyMessage = "Here are the drivers from Formula 1:\n\n";
        foreach ($groupedPilots as $temporada => $grupo) {
            $replyMessage .= "🏎️ Season: {$temporada}\n";

            $ordenedPilots = $grupo->sortBy('posicao');

            foreach ($ordenedPilots as $piloto) {
                $replyMessage .= "   Name: {$piloto->nome}\n";
                $replyMessage .= "   Position: {$piloto->posicao}\n";
                $replyMessage .= "   Points: {$piloto->pontuacao}\n\n";
            }
        }
        $telegramService->sendMessage($chatId, $replyMessage, 'Markdown');
    } elseif ($messageText == '3') {
        $equipes = Equipe::orderBy('temporada')->get();
        $groupedTeams = $equipes->groupBy('temporada');

        $replyMessage = "Here are the teams from Formula 1:\n\n";
        foreach ($groupedTeams as $temporada => $grupo) {
            $replyMessage .= "🏁 Season: {$temporada}\n";

            $ordenedTeams = $grupo->sortBy('posicao');

            foreach ($ordenedTeams as $equipe) {
                $replyMessage .= "   Position: {$equipe->posicao}\n";
                $replyMessage .= "   Team Name: {$equipe->nome}\n";
                $replyMessage .= "   Points: {$equipe->pontuacao}\n\n";
            }
        }
        $telegramService->sendMessage($chatId, $replyMessage, 'Markdown');
    } else {
        $telegramService->sendMessage($chatId, "🚫 Sorry, invalid option. Please choose 1, 2, or 3.", 'Markdown');
    }

    return response()->json(['status' => 'success']);
});
