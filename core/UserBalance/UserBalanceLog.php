<?php


namespace Core\UserBalance;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class UserBalance
 * @package Core\Balance
 *
 * @property int $id
 * @property int $user_balance_id
 * @property UserBalance $balance
 * @property int $amount
 * @property string $description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class UserBalanceLog extends Model
{
    /**
     * @return BelongsTo
     */
    public function balance()
    {
        return $this->belongsTo(UserBalance::class);
    }
}
