<?php

Namespace App\Controllers;

use Xcholars\Http\Controller;

use Xcholars\Http\Request;

use Xcholars\Http\Response;

use App\Models\Delivery;

class DelivariesController extends Controller
{
    use \App\Traits\HasValidation;

    public function create(Request $request, Response $response)
    {
        if ($error = $this->isInvalid($request, 'delivery'))
        {
            return $error;
        }

        Delivery::create($request->all());

        return $response->withSuccess('Delivery added Successfully');
    }

    public function show(Request $request, Response $response)
    {
        return $response->withView(
            'deliverer/delivery_areas', ['deliveries' => Delivery::all()]
        );
    }

    public function delete(Request $request, Response $response)
    {
        $category = Delivery::find($request->id);

        $category->delete();

        return $response->withRedirect('delivery_areas');
    }

}
