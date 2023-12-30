<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parents;
use App\Models\Children;
use App\Models\Services;

class AdminController extends Controller
{

    public function index($id)
    {
        if(view()->exists($id)){
            return view($id);
        }
        else
        {
            return view('404');
        }

    }

    public function users_accounts($type){

        switch($type){
            case 'parent':
                $accounts = Parents::query()->get();
                return view('parentslist',compact('accounts'));
                break;

            case 'children':
                $accounts = Children::query()->with('my_parent')->get();
                return view('childrenlist',compact('accounts'));
                break;

            default:
                return view('404');
        }

    }

    public function displayFeedback(){

        $feedback = Services::where('type', 'feedback')->with('service')->get();
        return view('Admin.display-feedback', compact('feedback'));
    }

    public function addBook(){
        return view('Admin.add-book');
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
