<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Corporation extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'business_name',
        'db_name',
        'db_user',
        'db_password',
        'system_url',
        'status',
        'registered_at',
        'user_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*******************************************************************************************
     * RELATIONSHIPS
     *******************************************************************************************/

    /**
     * Get the user associated with the corporation.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the companies associated with the corporation.
     */
    public function companies(): HasMany
    {
        return $this->hasMany(Company::class);
    }

    /**
     * Get the contacts associated with the corporation.
     */
    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }

    /**
     * Get the contracts associated with the corporation.
     */
    public function contracts(): HasMany
    {
        return $this->hasMany(Contract::class);
    }

    /**
     * Get the corporation document associated with the corporation.
     */
    public function corporationDocument(): HasMany
    {
        return $this->hasMany(CorporationDocument::class);
    }

    /*******************************************************************************************
     * ACCESSORS
     *******************************************************************************************/

    /**
     * Get the company's logo.
     *
     * @return string
     */
    public function getLogoAttribute(): string
    {
        return asset('storage/' . $this->attributes['logo']);
    }

    /**
     * Get command connection for mysql.
     *
     * @return string
     */
    public function getCommandConnectionAttribute(): string
    {
        return "mysql -u {$this->attributes['db_user']}
        -p{$this->attributes['db_password']} {$this->attributes['db_name']}";
    }
}
