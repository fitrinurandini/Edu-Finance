<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaguTahunan extends Model
{
    use HasFactory;

    protected $fillable = ['tahun_ajaran', 'nominal_sumbangan', 'nominal_atribut'];

}
