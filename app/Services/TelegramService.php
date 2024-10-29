<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class TelegramService
{
    protected $client;
    protected $token;

    public function __construct()
    {
        $this->client = new Client();
        $this->token = env('TELEGRAM_BOT_TOKEN');
    }

    public function sendMessage($chatId, $message, $parseMode = 'HTML')
    {
        $url = "https://api.telegram.org/bot{$this->token}/sendMessage";

        try {
            $response = $this->client->post($url, [
                'json' => [
                    'chat_id' => $chatId,
                    'text' => $message,
                    'parse_mode' => $parseMode,
                ]
            ]);
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            Log::error("Erro ao enviar mensagem: {$e->getMessage()}", [
                'chat_id' => $chatId,
                'message' => $message,
            ]);
        }
    }
}
