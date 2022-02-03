<?php

Namespace App\Controllers;

use Xcholars\Http\Controller;

use Xcholars\Http\Request;

use Xcholars\Http\Response;

use Xcholars\Support\Proxies\Gate;

use App\Models\Recipe;

class RecipeController extends Controller
{
    use \App\Traits\HasValidation;

    public function create(Request $request, Response $response)
    {
        if ($error = $this->isInvalid($request, 'recipe'))
        {
            return $error;
        }

        Recipe::create(
            array_merge(
                $request->except('photo'),
                ['photo' => Recipe::upload_photo()]
            )
        );

        return $response->withSuccess('Recipe added Successfully');
    }

    public function show(Request $request, Response $response)
    {
        if (Gate::allows('customer_only'))
        {
            return $response->withView(
                'customer/recipes', ['recipes' => Recipe::all()]
            );
        }

        if (Gate::allows('chef_only'))
        {
            return $response->withView(
                'chef/recipes', ['recipes' => Recipe::all()]
            );

        }

        return $response->withRedirect('/home');
    }

    public function edit(Request $request, Response $response)
    {
        return $response->withView(
            'chef/edit_recipe', ['recipe' => Recipe::find($request->id)]
        );
    }

    public function update(Request $request, Response $response)
    {
        $details = [];

        if (!empty($request->photo->getName()))
        {
            $details = ['photo' => Recipe::upload_photo()];
        }

        $recipe = Recipe::find($request->id);

        $recipe->update(array_merge($request->except('photo'), $details));

        return $response->withSuccess('Recipe updated Successfully');
    }

    public function delete(Request $request, Response $response)
    {
        $recipe = Recipe::find($request->id);

        unlink(upload_path('recipes\\'.$recipe->photo));

        $recipe->delete();

        return $response->withRedirect('recipes');
    }


}
