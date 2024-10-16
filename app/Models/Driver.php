<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    /**
     * Nome da tabela associada ao model.
     *
     * @var string
     */
    protected $table = 'driver';

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array
     */
    protected $fillable = [
        'temporada',
        'nome',
        'posicao',
        'pontuacao',
    ];
}
