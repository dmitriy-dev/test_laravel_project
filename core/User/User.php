<?php

namespace Core\User;

use Carbon\Carbon;
use Core\UserBalance\UserBalance;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package Core\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property string $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->status === UserStatus::STATUS_ACTIVE;
    }

    /**
     * @return bool
     */
    public function isBanned(): bool
    {
        return $this->status === UserStatus::STATUS_BANNED;
    }

    /**
     * @return bool
     */
    public function isWaitingActivation(): bool
    {
        return $this->status === UserStatus::STATUS_WAITING_ACTIVATION;
    }

    /**
     * @return HasMany
     */
    public function balance(): HasMany
    {
        return $this->hasMany(UserBalance::class);
    }
}
