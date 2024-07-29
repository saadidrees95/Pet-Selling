<?php

namespace App\Models;

use App\Models\Pet;
use App\Models\User;
use App\Models\AdView;
use App\Models\Service;
use App\Models\AdResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Ad
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $ref
 * @property string $title
 * @property string $req_date
 * @property int $duration
 * @property bool $active
 * @property string $about
 * @property int $service_id
 * @property int $pet_id
 * @property int $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property-read \App\Models\Pet $pets
 * @property-read \App\Models\Service $service
 * @property-read \App\Models\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AdView[] $views
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AdResponse[] $responses
 */
class Ad extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ref',
        'title',
        'req_date',
        'duration',
        'active',
        'about',
        'service_id',
        'pet_id',
        'user_id',
    ];

    /**
     * Define the relationship: an ad has many views.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function views()
    {
        return $this->hasMany(AdView::class);
    }

    /**
     * Define the relationship: an ad has many responses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function responses()
    {
        return $this->hasMany(AdResponse::class);
    }

    /**
     * Define the relationship: an ad belongs to a pet.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pets()
    {
        return $this->belongsTo(Pet::class, 'pet_id');
    }

    /**
     * Define the relationship: an ad belongs to a service.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    /**
     * Define the relationship: an ad belongs to a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
