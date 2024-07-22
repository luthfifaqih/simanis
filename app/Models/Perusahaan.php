<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    protected $table = 'perusahaan';

    protected $guarded = [''];

    public function uploadpersyaratans()
    {
        return $this->oneToMany(UploadPersyaratan::class, 'upload_persyaratans');
    }
}
