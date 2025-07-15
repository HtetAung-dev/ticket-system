<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'details',
        'customer_name',
        'customer_email',
        'customer_phone',
        'user_id',
        'caller_types_id',
        'call_types_id',
        'channels_id',
        'categories_id',
        'subcategories_id',
        'assigned_to',
        'target_date',
        'service_level',
        'conflict_level',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function staff()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function callerType()
    {
        return $this->belongsTo(CallerType::class);
    }

    public function callTypes()
    {
        return $this->belongsTo(CallTypes::class);
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }

    public function subCategories()
    {
        return $this->belongsTo(Subcategories::class);
    }

    public function channels()
    {
        return $this->belongsTo(Channels::class);
    }

    public function customerSegments()
    {
        return $this->belongsTo(CustomerSegments::class);
    }
}
