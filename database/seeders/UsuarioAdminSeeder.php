<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsuarioAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'luana@admin.com', // Coloque um email de admin
            'senha' => Hash::make('luana.admin'), // Defina uma senha segura
            'telefone' => '14998745623', // Telefone qualquer para preencher o campo
            'is_admin' => true, // Define como admin
        ]);
    }
}
