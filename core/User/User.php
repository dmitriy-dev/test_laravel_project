<?php

namespace Core\User;

use Carbon\Carbon;
use Core\Prize\Prize;
use Core\UserBalance\UserBalance;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
 * @property UserBalance $balance
 * @property Prize[] $prizes
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
     * @return HasOne
     */
    public function balance(): HasOne
    {
        return $this->hasOne(UserBalance::class);
    }

    /**
     * @return HasMany
     */
    public function prizes(): HasMany
    {
        return $this->hasMany(Prize::class);
    }
}
