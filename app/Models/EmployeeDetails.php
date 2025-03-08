<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'strJobTitle',
        'dtHireDate',
        'strLoginUser',
        'strDeleteStatus',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
