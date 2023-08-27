<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sd_certificate',
        'smp_certificate', 
        'birth_certificate',
        'family_card', 
        'pas_photo', 
        'signature'
    ];
}
