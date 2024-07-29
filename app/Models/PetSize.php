<?php

namespace App\Models;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class PetSize
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Pet[] $pets
 */
class PetSize extends Model
{
    use HasFactory;

    /**
     * Define the relationship: a pet size has many pets.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pets()
    {
        return $this->hasMany(Pet::class);
    }
}
