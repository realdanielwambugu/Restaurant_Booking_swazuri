<?php

Namespace App\Models;

use Xcholars\Database\Orm\Model;

use Xcholars\Support\Proxies\Auth;

class Cart extends Model
{
    protected $fillable = [
        'cart_id',
        'user_id',
        'recipe_id',
        'quantity',
        'total_cost',
    ];

    public function empty()
    {
        $recipes = $this->where('user_id', Auth::id())->where('status', 'pending')->get();

        foreach ($recipes  as $recipe)
        {
            $recipe->status = 'confirmed';

            $recipe->save();
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    public function total_cost($foods, $total_cost = 0)
    {
        $cost = 0;

        foreach ($foods as $food)
        {
            $total = $food->total_cost * $food->quantity;

            $cost = $cost + $total;
        }

        return $cost + $total_cost;
    }
}
