<?php


namespace Core\Prize;


use Carbon\Carbon;
use Core\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Prize
 * @package Core\Prize
 *
 * @property int $id
 * @property int $name
 * @property string $value
 * @property int $type
 * @property int $user_id
 * @property User $user
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Prize extends Model
{
    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return bool
     */
    public function isMoney(): bool
    {
        return $this->type === PrizeType::TYPE_MONEY;
    }

    /**
     * @return bool
     */
    public function isBonus(): bool
    {
        return $this->type === PrizeType::TYPE_BONUS;
    }

    /**
     * @return bool
     */
    public function isSubject(): bool
    {
        return $this->type === PrizeType::TYPE_SUBJECT;
    }
}
