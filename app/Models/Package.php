<?php

namespace App\Models;

use App\Models\Order;
// use App\Models\Discount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Package
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @property int $credits
 * @property int $discount_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property-read \App\Models\Discount $discount
 * @property-read \App\Models\Order $order
 */
class Package extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'price',
        'credits',
    ];

    /**
     * Define the relationship: a package belongs to a discount.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function discount()
    // {
    //     return $this->belongsTo(Discount::class, 'discount_id');
    // }

    /**
     * Define the relationship: a package has one order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
