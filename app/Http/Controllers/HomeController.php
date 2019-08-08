<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\Handler;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {
            $user = Auth::user();

            foreach ($user->roles as $role) {
                switch ($role->name) {
                    
                    case 'admin':
                        return redirect()->route('admin.index');
                    case 'user':
                        return redirect()->route('home');
                    
                    default:
                        # code...
                        break;
                }
            }
            
        } catch (Exception $e) {
            return redirect()->route('welcome');
        }

    }
}
