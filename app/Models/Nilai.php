<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nilai extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'nilai';
    protected $primaryKey = 'NilaiId';

    protected $guarded = ['NilaiCreatedAt', 'NilaiUpdatedAt', 'NilaiDeletedAt'];
    
    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class, 'NilaiPertanyaanId', 'PertanyaanId');
    }

    const CREATED_AT = 'NilaiCreatedAt';
    const UPDATED_AT = 'NilaiUpdatedAt';
    const DELETED_AT = 'NilaiDeletedAt';
}
