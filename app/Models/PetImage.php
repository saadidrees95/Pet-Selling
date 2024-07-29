<?php

namespace App\Models;

use App\Models\Pet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class PetImage
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $image_type
 * @property string $title
 * @property string $image_path
 * @property int $pet_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property-read \App\Models\Pet $pet
 */
class PetImage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'image_type',
        'title',
        'image_path',
        'pet_id',
    ];

    /**
     * Define the relationship: a pet image belongs to a pet.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pet()
    {
        return $this->belongsTo(Pet::class, 'pet_id');
    }
}
