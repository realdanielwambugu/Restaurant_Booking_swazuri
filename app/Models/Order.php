<?php

Namespace App\Models;

use Xcholars\Database\Orm\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'delivery_id',
        'cart_id',
        'quantity',
        'payment_code',
        'total_cost',
        'status',
    ];

    public function daily_sales()
    {
        $sales = 0;

        foreach ($this->where('created_at', 'like', '%' . date("Y-m-d") . '%')->where('status', 'confirmed')->get() as $order)
        {
            $sales = $sales + $order->total_cost;
        }

        return $sales;
    }

    public function monthly_sales()
    {
        $sales = 0;

        foreach ($this->where('created_at', 'like', '%' . date("Y-m") . '%')->where('status', 'confirmed')->get() as $order)
        {
            $sales = $sales + $order->total_cost;
        }

        return $sales;
    }

    public function total_sales()
    {
        $sales = 0;

        foreach ($this->where('status', 'confirmed')->get() as $order)
        {
            $sales = $sales + $order->total_cost;
        }

        return $sales;
    }

    public function status()
    {
        if ($this->isConfirmed())
        {
            return "<span class='color-pri'>{$this->status}</span>";
        }

        return $this->status;
    }

    public function isPending()
    {
        return $this->status === 'pending';
    }

    public function isConfirmed()
    {
        return $this->status === 'confirmed';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }

}
