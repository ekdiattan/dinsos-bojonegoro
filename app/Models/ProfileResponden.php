<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfileResponden extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'profileresponden';

    protected $primaryKey = 'ProfileRespondenId';

    protected $guarded = ['ProfileRespondenCreatedAt', 'ProfileRespondenUpdatedAt', 'ProfileRespondenDeletedAt'];

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'NilaiRespondenId', 'ProfileRespondenId');
    }
    
    const CREATED_AT = 'ProfileRespondenCreatedAt';
    const UPDATED_AT = 'ProfileRespondenUpdatedAt';
    const DELETED_AT = 'ProfileRespondenDeletedAt';
}
