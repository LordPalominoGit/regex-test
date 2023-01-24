<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $fillable = ['title', 'description','filePath','fileName','userId'];
    use HasFactory;
}
