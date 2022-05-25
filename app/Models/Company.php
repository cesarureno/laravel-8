<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

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
        'corporate_id'
    ];
}
