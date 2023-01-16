<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refsession extends Model
{
    use HasFactory;

    protected $guarded = ['id']; 

    protected $table = 'session_time';

}
