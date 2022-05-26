<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
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
        'position',
        'comments',
        'phone_number',
        'mobile_phone_number',
        'email',
        'corporate_id',
    ];

    public function corporate()
    {
        return $this->belongsTo(Corporate::class);
    }
}
