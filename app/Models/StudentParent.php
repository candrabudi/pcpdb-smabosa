<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentParent extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'parent_name',
        'birth_place',
        'birth_date',
        'education',
        'religion',
        'profession',
        'income',
        'whatsapp_phone',
        'type_parent',
    ];
}
