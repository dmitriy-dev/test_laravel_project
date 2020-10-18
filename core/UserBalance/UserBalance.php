<?php


namespace Core\UserBalance;


use Carbon\Carbon;
use Core\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Ramsey\Collection\Collection;

/**
 * Class UserBalance
 * @package Core\Balance
 *
 * @property int $id
 * @property int $user_id
 * @property User $user
 * @property int $user_balance_log_id
 * @property UserBalanceLog $logs
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class UserBalance extends Model
{
    /**
     * @return float
     */
    public function amount(): float
    {
        /** @var Collection $logs */
        $logs = $this->logs;
        return array_sum($logs->column('amount'));
    }

    /**
     * @param float $amount
     * @param string $description
     */
    public function append(float $amount, string $description): void
    {
        /** @var UserBalanceLog $log */
        $log = $this->logs()->make();
        $log->amount = $amount;
        $log->description = $description;
        try {
            $log->saveOrFail();
            $this->refresh();
        } catch (\Throwable $exception) {
            throw new \DomainException('Error appending a new row in balance', $exception->getCode(), $exception);
        }
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */
    public function logs()
    {
        return $this->hasMany(UserBalanceLog::class);
    }
}
