<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;

    /**
     * Nome da tabela associada ao model.
     *
     * @var string
     */
    protected $table = 'team';

    /**
     * 
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
