<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'logo',
        'db_name',
        'db_user',
        'db_password',
        'system_url',
        'status',
        'registered_at',
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
     * Get the corporate associated with the user.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
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
