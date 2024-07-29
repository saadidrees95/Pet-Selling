<?php

namespace App\Models;

use App\Models\Pet;
use App\Models\User;
use App\Models\Sitter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class PetType
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Pet[] $pets
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Sitter[] $sitters
 */
class PetType extends Model
{
    use HasFactory;

    /**
     * Define the relationship: a pet type has many pets.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pets()
    {
        return $this->hasMany(Pet::class);
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

    /**
     * Define the relationship: a pet type has many sitters.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sitters()
    {
        return $this->hasMany(Sitter::class, 'pet_type_id');
    }
}
