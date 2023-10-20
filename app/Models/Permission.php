<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model {

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category',
        'name',
        'code'
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];
}
