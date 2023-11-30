<?php

namespace App\Http\Controllers;

use App\Models\Children;
use App\Http\Requests\StoreChildrenRequest;
use App\Http\Requests\UpdateChildrenRequest;
use Illuminate\Support\Facades\Auth;
use App\Traits\Response;


class ChildrenController extends Controller
{
    
    public function index()
    {
        $childs = Children::where('parent_id',Auth::user()->id)->with('my_parent')->get();
        return view('Children_Cards',compact('childs'));
    }

    public function child_interface($id){
        
        $child = Children::find($id);
        return view('Children.dashboard',compact('child'));
    }


    public function create()
    {
        return view('Children.newacc');
    }

    public function store(StoreChildrenRequest $request)
    {
        $val_request = $request->validated();
        $existing_child = Children::where('name',$val_request)->first();
        if($existing_child)
            {//check if it's already added before.
            return $this->errorResponse('child already exists',401);
            }

            $newchild = Children::create([
                'name'        => $val_request['name'],
                'parent_id' => Auth::user()->id,
                'age'       => $val_request['age'],
                'password' => $val_request['password'],
            ]);
                return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Children  $children
     * @return \Illuminate\Http\Response
     */
    public function show(Children $children)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Children  $children
     * @return \Illuminate\Http\Response
     */
    public function edit(Children $children)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChildrenRequest  $request
     * @param  \App\Models\Children  $children
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChildrenRequest $request, Children $children)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Children  $children
     * @return \Illuminate\Http\Response
     */
    public function destroy(Children $children)
    {
        //
    }
}
