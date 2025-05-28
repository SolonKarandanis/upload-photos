<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property int|null $sender_id
 * @property int|null $sender_account_id
 * @property int|null $recipient_id
 * @property int|null $recipient_account_id
 * @property string $reference
 * @property string $status
 * @property string $amount
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $recipient
 * @property-read \App\Models\Account|null $recipientAccount
 * @property-read \App\Models\User|null $sender
 * @property-read \App\Models\Account|null $senderAccount
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transfer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transfer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transfer query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transfer whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transfer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transfer whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transfer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transfer whereRecipientAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transfer whereRecipientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transfer whereReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transfer whereSenderAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transfer whereSenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transfer whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Transfer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Transfer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public  function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
    public  function senderAccount(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'sender_account_id');
    }
    public  function recipient(): BelongsTo
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }
    public  function recipientAccount(): BelongsTo
    {
        return $this->belongsTo(Account::class, 'recipient_account_id');
    }
}
