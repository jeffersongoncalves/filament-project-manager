<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @property int $id
 * @property int $client_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Client $client
 * @property-read \App\Models\User $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClientUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClientUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClientUser query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClientUser whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClientUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClientUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClientUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ClientUser whereUserId($value)
 *
 * @mixin \Eloquent
 */
class ClientUser extends Pivot
{
    public $incrementing = true;

    protected $fillable = [
        'client_id',
        'user_id',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
