<?php

namespace App\Http\Controllers;

use illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Return a view according to the authenticated user's role.
     * [ChildrenServices => none]
     * @param none
     * @return \view
     */
    public function index(): \Illuminate\View\View
    {
        if(Auth::id())
        {
            $type = Auth()->user()->type;

            switch($type){
                case 'parent':
                    return view('index');
                case 'tutor':
                    return view('index');
                case 'admin':
                    return view('index');
                default:
                    return view('404');
            }
        }

        return view('404');
    }
}
