<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    /**
     * Nome da tabela associada ao model.
     *
     * @var string
     */
    protected $table = 'news';

    /**
     * 
     *
     * @var array
     */
    protected $fillable = [
        'titulo',
        'tipo',
        'descricao',
        'link',
    ];
}
