<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      if (auth()->check()) {
        // Pengguna sudah login, lanjutkan ke permintaan berikutnya.
        return $next($request);
      }

      // Pengguna belum login, bisa melakukan redirect atau respons sesuai kebutuhan.
      return redirect('/login-area');
    }
}
