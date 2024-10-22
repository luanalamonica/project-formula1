<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Services\TelegramService;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    // Validação dos dados do formulário
    $request->validate([
        'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'telefone' => ['required', 'string'], // Adicionando validação para o telefone
    ]);

    // Criar o usuário
    $user = User::create([
        'email' => $request->email,
        'senha' => Hash::make($request->password),
        'telefone' => $request->telefone,
    ]);

    // Disparar o evento de registro
    event(new Registered($user));

    // Autenticar o usuário
    Auth::login($user);

    // Enviar mensagem de boas-vindas via Telegram
    $telegramService = new \App\Services\TelegramService(); // Asegure-se de que o namespace está correto
    $chatId = $request->telefone; // NOTE: Aqui você deve ter o chat_id do Telegram de forma correta, não o telefone
    $message = "Bem-vindo ao site da Fórmula 1! Por favor, selecione uma opção:\n1. Notícias\n2. Pilotos\n3. Equipes";

    // Enviar mensagem de boas-vindas
    $telegramService->sendMessage($chatId, $message);

    // Redirecionar para a página inicial
    return redirect(RouteServiceProvider::HOME);
}

}
