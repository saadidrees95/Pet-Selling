<?php

namespace App\Models;

use App\Models\Ad;
use App\Models\Pet;
use App\Models\Role;
use App\Models\Order;
use App\Models\AdView;
use App\Models\Credit;
use App\Models\Sitter;
use App\Models\Address;
use App\Models\Payment;
use App\Models\PetType;
use App\Models\UserFile;
use App\Models\UserImage;
use App\Models\AdResponse;
use App\Models\Permission;
use App\Models\UsedCredit;
use App\Models\SitterReview;
use App\Models\PetOwnerReview;
use App\Models\PurchaseCredit;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $username
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string $email
 * @property string $password
 * @property string|null $mobile
 * @property string|null $about
 * @property int $role_id
 * @property bool $active
 * @property \Carbon\Carbon|null $email_verified_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property-read \App\Models\Role $role
 * @property-read \App\Models\Permission $permission
 * @property-read \App\Models\Address $address
 * @property-read \App\Models\Sitter|null $sitter
 * @property-read \App\Models\Payment|null $payment
 * @property-read \App\Models\UserImage|null $userImage
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Pet[] $pets
 * @property-read \App\Models\PetType|null $petType
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PetOwnerReview[] $petOwnerReviews
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Ad[] $ads
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AdView[] $views
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AdResponse[] $responses
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read \App\Models\Credit|null $credits
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PurchaseCredit[] $purchaseCredits
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UsedCredit[] $usedCredits
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SitterReview[] $sitterReviews
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'first_name',
        'last_name',
        'email',
        'mobile',
        'insurance_number',
        'password',
        'about',
        'notes',
        'role_id',
        'active',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Define the relationship: a user belongs to a role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Define the relationship: a user belongs to a permission.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }

    /**
     * Define the relationship: a user has one address.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function address()
    {
        return $this->hasOne(Address::class);
    }

    /**
     * Define the relationship: a user has one sitter profile.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sitter()
    {
        return $this->hasOne(Sitter::class);
    }

    /**
     * Define the relationship: a user has one payment record.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    /**
     * Define the relationship: a user has one user image.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userImage()
    {
        return $this->hasOne(UserImage::class);
    }


    /**
     * Define the relationship: a user has one user image.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userFile()
    {
        return $this->hasOne(UserFile::class);
    }


    /**
     * Define the relationship: a user has many pets.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pets()
    {
        return $this->hasMany(Pet::class);
    }

    /**
     * Define the relationship: a user has one pet type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function petType()
    {
        return $this->hasOne(PetType::class, 'user_id');
    }

    /**
     * Define the relationship: a user has many pet owner reviews.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function petOwnerReviews()
    {
        return $this->hasMany(PetOwnerReview::class, 'pet_owner_review_id');
    }

    /**
     * Define the relationship: a user has many ads.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

    /**
     * Define the relationship: a user has many ad views.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function views()
    {
        return $this->hasMany(AdView::class);
    }

    /**
     * Define the relationship: a user has many ad responses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function responses()
    {
        return $this->hasMany(AdResponse::class);
    }

    /**
     * Define the relationship: a user has many orders.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }

    /**
     * Define the relationship: a user has one credit record.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function credits()
    {
        return $this->hasOne(Credit::class);
    }

    /**
     * Define the relationship: a user has many purchase credits.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseCredits()
    {
        return $this->hasMany(PurchaseCredit::class);
    }

    /**
     * Define the relationship: a user has many used credits.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usedCredits()
    {
        return $this->hasMany(UsedCredit::class);
    }

    /**
     * Define the relationship: a user has many sitter reviews.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sitterReviews()
    {
        return $this->hasMany(SitterReview::class);
    }
}
