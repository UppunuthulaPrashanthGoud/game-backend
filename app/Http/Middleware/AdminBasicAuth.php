<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminBasicAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = env('ADMIN_USER', 'admin');
        $pass = env('ADMIN_PASS', 'admin123');

        if ($request->getUser() !== $user || $request->getPassword() !== $pass) {
            $headers = ['WWW-Authenticate' => 'Basic realm="Admin Area"'];
            return response('Unauthorized', 401, $headers);
        }

        return $next($request);
    }
}


