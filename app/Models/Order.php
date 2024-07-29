<?php

namespace App\Models;

use App\Models\User;
use App\Models\Package;
use App\Models\PurchaseCredit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Order
 *
 * @package App\Models
 *
 * @property int $id
 * @property float $price
 * @property int $credits
 * @property string $payment_status
 * @property string $transaction_id
 * @property int $package_id
 * @property int $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property-read \App\Models\User $user
 * @property-read \App\Models\Package $package
 */
class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'total_amount',
        'credits',
        'payment_status',
        'transaction_id',
        'package_id',
        'user_id',
    ];

    /**
     * Define the relationship: an order belongs to a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Define the relationship: an order belongs to a package.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
    public function purchaseCredits()
    {
        return $this->belongsTo(PurchaseCredit::class, 'purchase_credit_id');
    }
}
