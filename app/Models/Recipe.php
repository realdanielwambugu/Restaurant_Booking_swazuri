<?php

Namespace App\Models;

use Xcholars\Database\Orm\Model;

use Xcholars\Storage\FileSystem;

use Xcholars\Storage\File;

class Recipe extends Model
{
    protected $fillable = [
        'photo',
        'name',
        'category_id',
        'price',
        'description',
    ];

    public function upload_photo()
    {
        $storage = new FileSystem(upload_path('recipes'));

        $file = new \Upload\File('photo', $storage);

        $fileName = uniqid();

        $file->setName($fileName);

        $file->upload();

        return $file->getNameWithExtension();
    }
}
