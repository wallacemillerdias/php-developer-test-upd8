<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'cpf',
        'name',
        'birth_date',
        'sex',
        'address',
        'state_id',
        'city_id',
        'cidade'
    ];

    protected $hidden = [
        'state_id',
        'city_id',
    ];

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id'); // Omit the second parameter if you're following convention
    }
}
