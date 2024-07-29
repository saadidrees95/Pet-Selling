<?php

namespace App\Models;

use App\Models\Sitter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class SitterExperience
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $experience
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Sitter[] $sitters
 */
class SitterExperience extends Model
{
    use HasFactory;

    /**
     * Define the relationship: a sitter experience has many sitters.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sitters()
    {
        return $this->hasMany(Sitter::class);
    }
}
