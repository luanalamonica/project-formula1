<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->boolean('is_admin')->default(false); // Adiciona a coluna is_admin
        });
    }
    
    public function down()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropColumn('is_admin'); // Remove a coluna caso faça rollback
        });
    }
    
};
