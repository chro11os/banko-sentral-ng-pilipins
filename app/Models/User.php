<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password'];

    /**
     * The "booted" method handles the mandatory relationship.
     */
    protected static function booted(): void
    {
        static::created(function (User $user) {
            $user->balances()->create([
                'amount' => 0, // Using integer for bigInteger storage
                'fee'    => 0,
            ]);
        });
    }

    /**
     * Defines the "one-to-many" relationship.
     */
    public function balances(): HasMany
    {
        return $this->hasMany(Balance::class);
    }

    /**
     * Convenience method to get the primary/first balance.
     */
    public function balance(): HasOne
    {
        return $this->hasOne(Balance::class)->oldestOfMany();
    }
}
