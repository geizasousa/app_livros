<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivroAutor extends Model
{
    use HasFactory;

    protected $fillable = [
        'livro_id',
        'autor_id'
    ];
}
