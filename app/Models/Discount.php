<?php

namespace App\Models;

use App\Models\Package;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Discount
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property float $percentage
 * @property bool $active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Package[] $packages
 */
class Discount extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'percentage',
        'active',
    ];

    /**
     * Define the relationship: a discount has many packages.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
