<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @mixin Builder
 *
 * @method static Builder|static query()
 * @method static static make(array $attributes = [])
 * @method static static create(array $attributes = [])
 * @method static static forceCreate(array $attributes)
 * @method static firstOrNew(array $attributes = [], array $values = [])
 * @method static firstOrFail($columns = ['*'])
 * @method static firstOrCreate(array $attributes, array $values = [])
 * @method static firstOr($columns = ['*'], \Closure $callback = null)
 * @method static firstWhere($column, $operator = null, $value = null, $boolean = 'and')
 * @method static updateOrCreate(array $attributes, array $values = [])
 * @method null|static first($columns = ['*'])
 * @method static static findOrFail($id, $columns = ['*'])
 * @method static static findOrNew($id, $columns = ['*'])
 * @method static null|static find($id, $columns = ['*'])
 *
 * @property-read int $id
 *
 * @property string $business_name
 * @property string $rfc
 * @property string $country
 * @property string $state
 * @property string $city
 * @property string $neighborhood
 * @property string $address
 * @property string $postal_code
 * @property string $cfdi
 * @property string $rfc_url
 * @property string $acta_url
 * @property string $comments
 * @property bool $status
 * @property int $corporation_id
 *
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 * @property-read Carbon $deleted_at
 *
 * @property-read string $full_name
 *
 * @property-read Corporation $corporation
 *
 */
class Company extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'business_name',
        'rfc',
        'country',
        'state',
        'city',
        'neighborhood',
        'address',
        'postal_code',
        'cfdi',
        'rfc_url',
        'acta_url',
        'status',
        'comments',
        'corporation_id'
    ];

    /*******************************************************************************************
     * RELATIONSHIPS
     *******************************************************************************************/

    /**
     * Get the corporation associated with the company.
     */
    public function corporation(): BelongsTo
    {
        return $this->belongsTo(Corporation::class);
    }
}
