<?php

namespace App\Model;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Layanan extends Model
{
    use HasFactory, SoftDeletes, Uuid;

    protected $casts=[
        'id'=>'string',
    ];

    protected $fillable=[
        'id', 'nama', 'keterangan', 'instansi_id',
    ];
    
	public function instansi()
	{
		return $this->belongsTo('App\Model\Instansi');
	}

    public function file()
    {
        return $this->morphOne(File::class, 'morph');
    }

}
