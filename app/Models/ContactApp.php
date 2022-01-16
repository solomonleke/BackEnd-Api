<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactApp extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "email",
        "location",
        "designation",
        "phone",
        "image",
    ];
}

