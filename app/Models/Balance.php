<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Balance extends Model
{
    protected $fillable = ['user_id', 'amount', 'fee'];

    /**
     * Inverse relationship: every balance belongs to a specific user.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
