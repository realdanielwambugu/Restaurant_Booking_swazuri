<?php

if (! function_exists('app'))
{

function app()
{
   return Xcholars\Application::getInstance();
}

if (! function_exists('app_name'))
{

function app_name()
{
   return app()->getName();
}

}

}

if (! function_exists('class_basename'))
{

function class_basename($longName)
{
    if (!is_string($longName))
    {
        $longName = get_class($longName);
    }

    $array = explode('\\',$longName);

    return end($array);
}

}


if (! function_exists('basePath'))
 {

function basePath()
{
    return $base = app()->getBasePath();
}

}

if (! function_exists('array_flatten'))
{

function array_flatten(array $array)
{
    $flattened = [];

    foreach ($array as $value)
    {
        if (is_array($value))
        {
           $flattened = array_merge($flattened, array_flatten($value));

           continue;
        }

        $flattened[] = $value;

    }

    return $flattened;
}

}


if (! function_exists('public_path'))
{
    function public_path($path = null)
    {
        $base = basePath() ? basePath() . DIRECTORY_SEPARATOR : DIRECTORY_SEPARATOR;

        return $base . 'public' . DIRECTORY_SEPARATOR . $path;
    }

}


if (! function_exists('view_path'))
{
    function view_path($view = null)
    {
        $path = public_path('views' . DIRECTORY_SEPARATOR . $view);

        return trim(str_replace(basePath(), '', $path), '/\\');

        // return public_path('views' . DIRECTORY_SEPARATOR . $view);
    }

}

if (! function_exists('assets_path'))
{
    function assets_path($file = null)
    {
        return public_path('assets' . DIRECTORY_SEPARATOR . $file);
    }

}

if (! function_exists('view'))
{
    function view($file)
    {
        return view_path($file . '.php');
    }

}

if (! function_exists('images_path'))
{
    function images_path($image = null)
    {
        return assets_path('images' . DIRECTORY_SEPARATOR . $image);
    }

}

if (! function_exists('icons_path'))
{
    function icons_path($file = null)
    {
        return assets_path('icons' . DIRECTORY_SEPARATOR . $file);
    }

}

if (! function_exists('css_path'))
{
    function css_path($file = null)
    {
        return assets_path('css' . DIRECTORY_SEPARATOR . $file);
    }

}

if (! function_exists('js_path'))
{
    function js_path($file = null)
    {
        return assets_path('js' . DIRECTORY_SEPARATOR . $file);
    }

}

if (! function_exists('package_path'))
{
    function package_path($file = null)
    {
        return public_path('node_modules' . DIRECTORY_SEPARATOR . $file);
    }

}


if (! function_exists('upload_path'))
{
    function upload_path($path = null)
    {
        $path = assets_path('images' . DIRECTORY_SEPARATOR . $path);

        return trim(str_replace(basePath(), '', $path), '/\\');
    }

}

if (! function_exists('auth'))
{
    function auth()
    {
        return app()->make(\Xcholars\Auth\AuthManagerContract::class);
    }

}

if (! function_exists('category'))
{
    function category()
    {
        return app()->make(\App\Models\Category::class);
    }

}

if (! function_exists('cart_count'))
{
    function cart_count()
    {
        return app()->make(\App\Models\Cart::class)
                    ->where('user_id', auth()->id())
                    ->where('status', 'pending')
                    ->count();
    }

}


if (! function_exists('truncate'))
{
    function truncate($text, $chars = 120) {
    if(strlen($text) > $chars) {
        $text = $text.' ';
        $text = substr($text, 0, $chars);
        $text = substr($text, 0, strrpos($text ,' '));
        $text = $text.'...';
    }
    return $text;
}

}
