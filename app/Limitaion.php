<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Limitaion extends Model
{
    use SoftDeletes,HasFactory;

    public $table = 'limitations';

    protected $fillable = [
        'limitaions',
        'limit',
    ];
}
