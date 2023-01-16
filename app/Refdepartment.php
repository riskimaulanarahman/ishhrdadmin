<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refdepartment extends Model
{
    use HasFactory;

    protected $guarded = ['id']; 

    protected $table = 'department';

}
