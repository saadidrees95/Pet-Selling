<?php

namespace App\Models;

use App\Models\Ad;
use App\Models\User;
use App\Models\Sitter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class AdResponse
 *
 * @package App\Models
 *
 * @property int $id
 * @property int $responses_count
 * @property string $token
 * @property int $sitter_id
 * @property int $user_id
 * @property int $ad_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property-read \App\Models\User $user
 * @property-read \App\Models\Sitter $sitter
 * @property-read \App\Models\Ad $ads
 */
class AdResponse extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ref',
        'responses_count',
        'token',
        'sitter_id',
        'user_id',
        'ad_id',
    ];

    /**
     * Define the relationship: an ad response belongs to a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Define the relationship: an ad response belongs to a sitter.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sitter()
    {
        return $this->belongsTo(Sitter::class, 'sitter_id');
    }

    /**
     * Define the relationship: an ad response belongs to an ad.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ads()
    {
        return $this->belongsTo(Ad::class, 'ad_id');
    }
}
