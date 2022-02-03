<?php

Namespace App\Controllers;

use Xcholars\Http\Controller;

use Xcholars\Http\Request;

use Xcholars\Http\Response;

use Xcholars\Support\Proxies\Auth;

use Xcholars\Support\Proxies\Hash;

use App\Models\User;

class ProfileController extends Controller
{
    use \App\Traits\HasValidation;

    public function create(Request $request, Response $response)
    {
        if ($error = $this->isInvalid($request, 'signup'))
        {
            return $error;
        }

        $request->post->set('password', Hash::make($request->password));

        User::create($request->all());

        return $response->withSuccess('User added successfully');

    }

    public function show(Request $request, Response $response)
    {
        if (Auth::user()->isAdmin())
        {
            return $response->withView('admin/users', ['users' => User::all()]);
        }

        return $response->withView(
            Auth::user()->type . '/profile',
            ['user' => Auth::user()]
        );
    }

    public function edit(Request $request, Response $response)
    {
        return $response->withView(
            'admin/edit_user',
            ['user' => User::find($request->id)]
        );
    }

    public function update(Request $request, Response $response)
    {
        User::find($request->id)->update($request->except('id'));

        return $response->WithSuccess('user updated successfully');
    }

    public function delete(Request $request, Response $response)
    {
        User::find($request->id)->delete($request->id);

        return $response->withRedirect('users');
    }


}
