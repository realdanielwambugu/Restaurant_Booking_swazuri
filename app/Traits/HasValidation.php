<?php

Namespace App\Traits;

use Xcholars\Http\Request;

use Xcholars\Support\Proxies\Response;


trait HasValidation
{
    function isInvalid(Request $request, $for)
    {
        $validation = $this->validate($request)->for($for);

        if ($validation->fails())
        {
            return Response::withError($validation->errors()->first());
        }

        return false;
    }

}
