<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    use HasFactory;

    protected $table = 'problems';

    protected $fillable = [
        'id',
        'nopol',
        'id_user',
        'waktu',
        'name',
        'nik',
        'agama',
        'pekerjaan',
        'status',
        'jk',
        'alamat',
        'negara',
        'tlp',
        'j_kendaraan',
        'gb_customer',
        'no_stnk',
        'kejadian',
        'penanganan',
        'kronologi',
        'gb_customer',
    ];

    public function users(){
        return $this->belongsTo('App\Models\User', 'id_user', 'id');
    }

    public function mobils(){
        return $this->belongsTo('App\Models\Mobil', 'nopol', 'nopol');
    }

    public function motors(){
        return $this->belongsTo('App\Models\Motor', 'nopol', 'nopol');
    }

}
