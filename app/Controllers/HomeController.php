<?php

Namespace App\Controllers;

use Xcholars\Http\Request;

use Xcholars\Http\Response;

use Xcholars\Support\Proxies\Gate;

use App\Models\User;

use App\Models\Order;

use App\Models\Recipe;

use App\Models\Category;

use Xcholars\Support\Proxies\Auth;

class HomeController
{
    public function show(Request $request, Response $response)
    {
        if (Auth::check())
        {
            if (Gate::allows('admin_only'))
            {
                return $this->showAdmin($response);
            }

            if (Gate::allows('chef_only'))
            {
                return $this->showChef($response);
            }

            if (Gate::allows('mealDeliverer_only'))
            {
                return $this->showMealDeliverer($response);
            }
        }

        if ($request->query->has('id'))
        {
            $recipes =  Recipe::where('category_id', $request->id)->get();
        }
        else
        {
            $recipes =  Recipe::all();
        }

        return $response->withView(
            'customer/home',
            [
                'recipes'  => $recipes,
                'foodCategory' => Category::find($request->id) ?? false,
            ]
        );
    }

    public function showAdmin(Response $response)
    {
        $order = new Order;

        return $response->withView(
            'admin/home',
            [
                'users_count' => User::count(),
                'daily_sales' => $order->daily_sales(),
                'monthly_sales' => $order->monthly_sales(),
                'total_sales' => $order->total_sales()
            ]
        );
    }

    public function showChef(Response $response)
    {
        return $response->withView(
            'chef/home',
            [
                'recipes_count' => Recipe::count()
            ]
        );
    }

    public function showMealDeliverer(Response $response)
    {
        return $response->withView(
            'deliverer/home',
            [
                'orders_count' => Order::count(),
                'pending_orders_count' => Order::where('status', 'pending')->count(),
                'confirmed_orders_count' => Order::where('status', 'confirmed')->count()
            ]
        );
    }
}
