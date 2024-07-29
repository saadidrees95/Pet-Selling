<?php

namespace App\Models;

use App\Models\User;
use App\Models\PetType;
use App\Models\AdResponse;
use App\Models\SitterReview;
use App\Models\SitterExperience;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Sitter
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $sit_type
 * @property float $rate
 * @property string $availability
 * @property string $charging_mode
 * @property int $sitter_experience_id
 * @property int $pet_type_id
 * @property int $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property-read \App\Models\User $user
 * @property-read \App\Models\SitterExperience $experience
 * @property-read \App\Models\PetType $petType
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AdResponse[] $responses
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SitterReview[] $sitterReview
 */
class Sitter extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sit_type',
        'other_species',
        'availability',
        'insurance',
        'charging_mode',
        'sitter_experience_id',
        'pet_type_id',
        'user_id',
    ];

    /**
     * Define the relationship: a sitter belongs to a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define the relationship: a sitter belongs to a sitter experience.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function experience()
    {
        return $this->belongsTo(SitterExperience::class, 'sitter_experience_id');
    }

    /**
     * Define the relationship: a sitter belongs to a pet type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function petType()
    {
        return $this->belongsTo(PetType::class, 'pet_type_id');
    }

    /**
     * Define the relationship: a sitter has many ad responses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function responses()
    {
        return $this->hasMany(AdResponse::class);
    }

    /**
     * Define the relationship: a sitter has many sitter reviews.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sitterReview()
    {
        return $this->hasMany(SitterReview::class);
    }
}
