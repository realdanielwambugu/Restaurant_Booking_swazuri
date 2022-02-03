<?php

Namespace App\Controllers;

use Xcholars\Http\Controller;

use Xcholars\Http\Request;

use Xcholars\Http\Response;

use Xcholars\Support\Proxies\Gate;

use Xcholars\Support\Proxies\Auth;

use App\Models\Cart;

use App\Models\Order;

use App\Models\Delivery;

class OrdersController extends Controller
{
    use \App\Traits\HasValidation;

    public function checkout(Request $request, Response $response)
    {
        $cart = new Cart;

        $foods = $cart->where('cart_id', $request->cart_id)->get();

        return $response->withView(
            'customer/checkout',
            [
                'foods' => $foods,
                'total_cost' => $cart->total_cost($foods),
                'delivery_areas' => Delivery::all(),
            ]
        );
    }

    public function create(Request $request, Response $response)
    {
        if ($error = $this->isInvalid($request, 'order'))
        {
            return $error;
        }

        $cart = new Cart;

        $sql = Cart::where('user_id', Auth::id())
                          ->where('status', 'pending');

        $total_cost = Delivery::find($request->delivery_id)->cost;

        Order::create([
            'user_id' => Auth::id(),
            'quantity' => $sql->count(),
            'cart_id' => $sql->first()->cart_id ,
            'delivery_id' => explode('|', $request->delivery_id)[0],
            'payment_code'  => $request->payment_code,
            'total_cost'  => $cart->total_cost(Cart::where('user_id', Auth::id())
                                  ->where('status', 'pending')->get(), $total_cost),
        ]);

        $cart->empty();

        return $response->withSuccess('order placed successfully');
    }

    public function show(Request $request, Response $response)
    {
        if (Auth::check())
        {
            if (Gate::allows('mealDeliverer_only'))
            {
                return $response->withView(
                    'deliverer/orders',
                    [
                        'orders' => Order::all(),
                    ]
                );
            }

            return $response->withView(
                'customer/orders',
                ['orders' => Order::where('user_id', auth::id())->get()]
            );
        }

        return $response->withRedirect('/home');
    }

    public function show_items(Request $request, Response $response)
    {
        $order  = Order::where('cart_id', $request->cart_id)->first();

        $items  = Cart::where('cart_id', $request->cart_id)->get();

        if (Auth::check())
        {
            if (Gate::allows('mealDeliverer_only'))
            {
                return $response->withView(
                    'deliverer/order_items',
                    [
                        'items' => $items,
                        'order' => $order
                    ]
                );
            }

            return $response->withView(
                'customer/order_items',
                [
                    'items' => $items,
                    'order' =>$order
                ]
            );
        }

        return $response->withRedirect('/home');

    }

    public function Confirm(Request $request, Response $response)
    {
        $order = Order::find($request->id);

        $order->status = 'confirmed';

        $order->save();

        return $response->withRedirect('/orders');
    }



}
