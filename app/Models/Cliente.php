<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'cpf',
        'nome',
        'data_nascimento',
        'sexo',
        'endereco',
        'estado_id',
        'cidade_id',
        'cidade'
    ];

    public function getNomeAttribute($value)
    {
        return ucfirst($value);
    }

    public function estado(): BelongsTo
    {
        dd('jean');
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    public function cidade(): BelongsTo
    {
        return $this->belongsTo(Cidade::class, 'cidade_id'); // Omit the second parameter if you're following convention
    }

}
