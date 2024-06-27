<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kepuasan extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'kepuasan';
    protected $primaryKey = 'KepuasanId';

    protected $guarded = [
        'KepuasanCreatedAt', 
        'KepuasanUpdatedAt', 
        'KepuasanDeletedAt'
    ];

    const CREATED_AT = 'KepuasanCreatedAt';
    const UPDATED_AT = 'KepuasanUpdatedAt';
    const DELETED_AT = 'KepuasanDeletedAt';
}
