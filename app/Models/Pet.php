<?php

namespace App\Models;

use App\Models\Ad;
use App\Models\User;
use App\Models\PetAge;
use App\Models\PetSize;
use App\Models\PetType;
use App\Models\PetImage;
use App\Models\PetMedication;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Pet
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 * @property string $breed
 * @property string $behavior
 * @property string $about
 * @property int $user_id
 * @property int $pet_type_id
 * @property int $pet_size_id
 * @property int $pet_age_id
 * @property int $pet_medication_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property-read \App\Models\User $user
 * @property-read \App\Models\PetType $type
 * @property-read \App\Models\PetAge $age
 * @property-read \App\Models\PetSize $size
 * @property-read \App\Models\PetMedication $medication
 * @property-read \App\Models\PetImage $image
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Ad[] $ads
 */
class Pet extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'number',
        'breed',
        'behavior',
        'about',
        'user_id',
        'pet_type_id',
        'pet_size_id',
        'pet_age_id',
        'pet_medication_id',
    ];

    /**
     * Define the relationship: a pet belongs to a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define the relationship: a pet belongs to a type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(PetType::class, 'pet_type_id');
    }

    /**
     * Define the relationship: a pet belongs to an age.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function age()
    {
        return $this->belongsTo(PetAge::class, 'pet_age_id');
    }

    /**
     * Define the relationship: a pet belongs to a size.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function size()
    {
        return $this->belongsTo(PetSize::class, 'pet_size_id');
    }

    /**
     * Define the relationship: a pet belongs to a medication.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medication()
    {
        return $this->belongsTo(PetMedication::class, 'pet_medication_id');
    }

    /**
     * Define the relationship: a pet has one image.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function image()
    {
        return $this->hasOne(PetImage::class);
    }

    /**
     * Define the relationship: a pet has many ads.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ads()
    {
        return $this->hasMany(Ad::class);
    }
}
