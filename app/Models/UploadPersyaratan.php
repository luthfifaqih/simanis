<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadPersyaratan extends Model
{
    use HasFactory;

    protected $table = 'upload_persyaratans';

    protected $guarded = [''];


    public function perusahaan()
    {
        return $this->oneToMany(Perusahaan::class, 'perusahaan');
    }
}
