<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class RuanganPilihUser extends Model
{
    use HasFactory;
    // protected $with = ['user'];
    public function user()
    {
        // return $this->belongsTo(User::class)->with('user');
        return $this->belongsTo(User::class);
    }
    public function jatwalruangantersedia()
    {
        return $this->belongsTo(JatwalRuanganTersedia::class);
    }
}
