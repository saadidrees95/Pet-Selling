<?php

namespace App\Models;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class UsedCredit
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $token
 * @property int $credit
 * @property int $user_id
 * @property int $ad_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property-read \App\Models\Credit $creditRelation
 */
class UsedCredit extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'token',
        'credit',
        'user_id',
        'ad_id',
    ];

    /**
     * Define the relationship: used credit belongs to a credit entry.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function ads()
    {
        return $this->belongsTo(Ad::class, 'ad_id');
    }
}
