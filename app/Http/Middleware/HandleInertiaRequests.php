<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param \Illuminate\Http\Request $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
            ],
            'flash' => function () use ($request) {
                return [
                    'mensaje' => fn () => $request->session()->get('mensaje'),
                    'error' => fn () => $request->session()->get('error'),
                    'success' => $request->session()->get('success'),
                    'data' => fn () => $request->session()->get('data'),
                    'refugios' => fn () => $request->session()->get('refugios'),
                    'colonias' => fn () => $request->session()->get('colonias'),
                    'coloniasrefugios' => fn () => $request->session()->get('coloniasrefugios'),
                ];
            },
            'showingMobileMenu' => false,
        ]);
    }
}
