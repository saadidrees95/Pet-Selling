<?php

namespace App\Models;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class PetMedication
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
class PetMedication extends Model
{
    use HasFactory;

    /**
     * Define the relationship: a pet medication has many pets.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pets()
    {
        return $this->hasMany(Pet::class);
    }
}
