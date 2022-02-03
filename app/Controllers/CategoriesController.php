<?php

Namespace App\Controllers;

use Xcholars\Http\Controller;

use Xcholars\Http\Request;

use Xcholars\Http\Response;

use App\Models\Category;

class CategoriesController extends Controller
{
    use \App\Traits\HasValidation;

    public function create(Request $request, Response $response)
    {
        if ($error = $this->isInvalid($request, 'category'))
        {
            return $error;
        }

        Category::create($request->all());

        return $response->withSuccess('Category added Successfully');
    }

    public function show(Request $request, Response $response)
    {
        return $response->withView(
            'chef/categories', ['categories' => Category::all()]
        );
    }

    public function edit(Request $request, Response $response)
    {
        return $response->withView(
            'chef/edit_category', ['category' => Category::find($request->id)]
        );
    }

    public function update(Request $request, Response $response)
    {
        $category = Category::find($request->id);

        $category->update($request->all());

        return $response->withSuccess('Category updated Successfully');
    }

    public function delete(Request $request, Response $response)
    {
        $category = Category::find($request->id);

        $category->delete();

        return $response->withRedirect('categories');
    }

}
