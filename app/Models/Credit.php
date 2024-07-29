<?php

namespace App\Models;

use App\Models\User;
use App\Models\UsedCredit;
use App\Models\PurchaseCredit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Credit
 *
 * @package App\Models
 *
 * @property int $id
 * @property float $balance
 * @property int $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property-read \App\Models\User $user
 * @property-read \App\Models\PurchaseCredit $buy
 * @property-read \App\Models\UsedCredit $use
 */
class Credit extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'balance',
        'user_id',
    ];

    /**
     * Define the relationship: a credit belongs to a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Define the relationship: a credit has one purchase record.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    // public function buy()
    // {
    //     return $this->hasOne(PurchaseCredit::class);
    // }

    /**
     * Define the relationship: a credit has one used credit record.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    // public function use()
    // {
    //     return $this->hasOne(UsedCredit::class);
    // }
}
