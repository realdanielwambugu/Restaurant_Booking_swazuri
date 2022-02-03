<?php

Namespace App\Models;

use Xcholars\Database\Orm\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];
}
