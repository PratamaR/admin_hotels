<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fhotel extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'picture'];
    protected $guarded = ['id'];
}
