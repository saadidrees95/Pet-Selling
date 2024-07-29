<?php

namespace App\Models;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class AdView
 *
 * @package App\Models
 *
 * @property int $id
 * @property int $views_count
 * @property string $token
 * @property int $user_id
 * @property int $ad_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property-read \App\Models\Ad $ads
 * @property-read \App\Models\User $user
 */
class AdView extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'views_count',
        'token',
        'user_id',
        'ad_id',
    ];

    /**
     * Define the relationship: an ad view belongs to an ad.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ads()
    {
        return $this->belongsTo(Ad::class, 'ad_id');
    }

    /**
     * Define the relationship: an ad view belongs to a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
