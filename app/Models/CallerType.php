<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallerType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
