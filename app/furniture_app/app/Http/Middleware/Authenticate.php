<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {

            $uri = $request->path();

            // URIが以下３つから始まる場合
            if(Str::startsWith($uri, ['masters/'])) {

                return 'master/index';

            }

            return route('login');
        }
    }
}
