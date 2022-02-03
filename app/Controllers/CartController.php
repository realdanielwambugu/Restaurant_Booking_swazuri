<?php

Namespace App\Controllers;

use Xcholars\Http\Controller;

use Xcholars\Http\Request;

use Xcholars\Http\Response;

use Xcholars\Support\Proxies\Auth;

use App\Models\Recipe;

use App\Models\Cart;

class CartController extends Controller
{
    use \App\Traits\HasValidation;

    public function create(Request $request, Response $response)
    {
        $count = Cart::where('user_id', Auth::id())
                      ->where('recipe_id', $request->id)
                      ->where('status', 'pending')
                      ->count();

        if ($count)
        {
            return $response->withFlush(cart_count());
        }

        $recipe = Recipe::find($request->id);

        $cart = Cart::where('user_id', Auth::id())
                       ->where('status', 'pending')
                       ->first();

        $cart_id = empty($cart ) ? uniqid() : $cart->cart_id;

        Cart::create([
            'cart_id' => $cart_id,
            'user_id' => Auth::id(),
            'recipe_id' => $recipe->id,
            'quantity' => 1,
            'total_cost' => $recipe->price,
        ]);

        return $response->withFlush(cart_count());
    }

    public function show(Request $request, Response $response)
    {
        return $response->withView(
            'customer/cart',
            [
                'products' => Cart::where('user_id', Auth::id())
                                ->where('status', 'pending')->get()
            ]
        );
    }

    public function save(Request $request, Response $response)
    {
        $price = Recipe::find($request->id)->price;

        $recipe = Cart::where('recipe_id', $request->id)
                      ->where('user_id', Auth::id())
                      ->where('status', 'pending')->first();

        $recipe->quantity = $request->quantity;

        $recipe->total_cost = $recipe->quantity * $price;

        $recipe->save();

        return $response->withFlush($recipe->total_cost);
    }

    public function delete(Request $request, Response $response)
    {
        $recipe = Cart::where('recipe_id', $request->id)
                      ->where('user_id', Auth::id())
                      ->where('status', 'pending')->first();

        $recipe->delete();

        return $response->withRedirect('/cart');
    }


}
