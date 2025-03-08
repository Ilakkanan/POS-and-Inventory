<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalDetails extends Model
{
    use HasFactory;

    protected $table = 'personal_details';

    protected $fillable = [
        'user_id',
        'srtFirstName',
        'srtLastName',
        'dtDOB',
        'strGender',
        'strNIC',
        'strAddress',
        'strImage',
        'intPhoneNo',
        'strLoginUser',
        'strDeleteStatus',
    ];

    // ============ RelationShip ============
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
