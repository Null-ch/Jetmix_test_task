<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appeal extends Model
{
    use HasFactory;

    protected $fillable = [
        'theme',
        'message',
        'name',
        'email',
        'file',
    ];

    protected $table = 'appeals';
    protected $guarded = false;
}
