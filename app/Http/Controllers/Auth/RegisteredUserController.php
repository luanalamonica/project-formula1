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

    $request->validate([
        'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'telefone' => ['required', 'string'], 
    ]);

    $user = User::create([
        'email' => $request->email,
        'senha' => Hash::make($request->password),
        'telefone' => $request->telefone,
    ]);

    event(new Registered($user));

    Auth::login($user);

    $telegramService = new \App\Services\TelegramService(); 
    $chatId = $request->telefone;
    $message = "Bem-vindo ao site da Fórmula 1! Por favor, selecione uma opção:\n1. Notícias\n2. Pilotos\n3. Equipes";

    $telegramService->sendMessage($chatId, $message);

    return redirect(RouteServiceProvider::HOME);
}

}
