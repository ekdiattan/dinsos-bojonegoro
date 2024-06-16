<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pertanyaan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pertanyaan';
    protected $primaryKey = 'PertanyaanId';
    
    protected $guarded = [
        'PertanyaanCreatedAt',
        'PertanyaanUpdatedAt',
        'PertanyaanDeletedAt'
    ];

    const CREATED_AT = 'PertanyaanCreatedAt';
    const UPDATED_AT = 'PertanyaanUpdatedAt';
    const DELETED_AT = 'PertanyaanDeletedAt';
    
}
