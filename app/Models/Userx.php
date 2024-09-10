<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userx extends Model
{
    protected $table = 'userx';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'password'];


    use HasFactory;
}
