<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class PurchaseCredit
 *
 * @package App\Models
 *
 * @property int $id
 * @property int $credit
 * @property int $user_id
 * @property int $order_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property-read \App\Models\Credit $creditRelation
 */
class PurchaseCredit extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'credit',
        'user_id',
        'order_id',
    ];

    /**
     * Define the relationship: a purchased credit belongs to a credit record.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function orders()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
