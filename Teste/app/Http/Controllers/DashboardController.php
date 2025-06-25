<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class DashboardController extends BaseController
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }
        return match (strtolower($user->role ?? '')) {
            'master' => view('dashboards/adminstrador_master'),
            'aluno' => view('dashboards/aluno'),
            'editor' => view('dashboard.editor'),
            'user'   => view('dashboard.user'),
            default => redirect()->route('profile.edit')
                ->with('error', 'Perfil sem função válida')
        };
    }
}