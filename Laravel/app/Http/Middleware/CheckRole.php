<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Vérifier si l'utilisateur est connecté

        if (!auth()->check()) 
        {

            return redirect()->route('login')->withErrors(['Accès interdit']);
            
        }

        // Vérifier si l'utilisateur courant a un des rôles autorisés
            
        $userRoles = explode(',', auth()->user()->typeCompte);
        
        foreach ($roles as $role) 
        {
        
            if (in_array($role, $userRoles))
            {
        
            return $next($request);
        
            }
        
        }
            // Sinon, rediriger vers une page d'erreur

            
           return redirect()->route('login')->withErrors(['Vous n\'avez pas l\'accès a cette page']);
    }
}
