<?php

namespace App\Model;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instansi extends Model
{
    use HasFactory, SoftDeletes, Uuid;

    protected $casts=[
        'id'=>'string',
    ];

    protected $fillable=[
        'id', 'nama', 'alamat', 'telepon', 'tracking', 'email', 'website', 'layanan', 'dasarhukum', 'persyaratan', 'waktudanbiaya', 'alur',
    ];
    
    public function file()
    {
        return $this->morphOne(File::class, 'morph');
    }

    public function layanans()
    {
        return $this->hasMany('App\Model\Layanan');
    }

}
