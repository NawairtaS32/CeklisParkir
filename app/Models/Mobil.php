<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $table = 'mobils';

    protected $fillable = [
        'id',
        'waktu',
        'id_user',
        'nopol',
        'type',
        'spion',
        'ban',
        'area_parkir',
        'gb_depan',
        'gb_kanan',
        'gb_belakang',
        'gb_kiri',
        'kondisi',
        'status',
        'ket',
    ];

    public function users(){
        return $this->belongsTo('App\Models\User', 'id_user', 'id');
    }

    public function problems(){
        return $this->belongsTo('App\Models\Problem', 'nopol', 'nopol');
    }
}
