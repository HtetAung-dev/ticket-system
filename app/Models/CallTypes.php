<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallTypes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function Tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
