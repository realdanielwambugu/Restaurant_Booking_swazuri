<?php

Namespace App\Models;

use Xcholars\Database\Orm\Model;

class User extends Model
{
    protected $fillable = [
        'fullName',
        'email',
        'phone',
        'password',
        'type',
        'status',
    ];

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function types()
    {
        $types =  ['admin', 'manager', 'chef', 'deliverer', 'customer'];

        $type = array_search($this->type, $types);

        unset($types[$type]);

        return $types;
    }

    public function isAdmin()
    {
        return $this->type === 'admin';
    }

    public function isChef()
    {
        return $this->type === 'chef';
    }

    public function isManager()
    {
        return $this->type === 'manager';
    }

    public function isMealDeliverer()
    {
        return $this->type === 'deliverer';
    }

    public function isCustomer()
    {
        return $this->type === 'customer';
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }



}
