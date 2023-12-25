<?php

namespace App\Http\Controllers;


use App\Models\Children;
use App\Http\Requests\StoreChildrenRequest;
use App\Http\Requests\UpdateChildrenRequest;
use Illuminate\Support\Facades\Auth;
use App\Traits\Response;


class ChildrenController extends Controller
{
    use Response;

    public function index()
    {
        $childs = Children::where('parent_id',Auth::user()->id)->with('my_parent')->get();
        return view('Children_Cards',compact('childs'));
    }

    public function child_interface($id)
    {
        $child = Children::find($id);
        return view('Children.dashboard',compact('child'));
    }


    public function create()
    {
        return view('Parent.newchild');
    }

    public function store(StoreChildrenRequest $request)
    {
        $val_request = $request->validated();
        $existing_child = Children::where('name',$val_request)->where('parent_id',auth()->user()->id)->first();

        if($existing_child)
        {                           //check if it's already added before.
            return $this->errorResponse('child already exists',401);
        }

        if($request->image != null)
        {                           //check if the user uploaded an image while
                                    //creating a child profile because it's causing some troubles
            $newchild = Children::create([
                'name'        => $val_request['name'],
                'parent_id'   => Auth::user()->id,
                'age'         => $val_request['age'],
                'password'    => $val_request['password'],
                'image'       => $val_request['image'],
            ]);

            return redirect()->back();
        }

        $newchild = Children::create([
            'name'        => $val_request['name'],
            'parent_id'   => Auth::user()->id,
            'age'         => $val_request['age'],
            'password'    => $val_request['password'],
        ]);

        return redirect()->back();
    }

    public function show(Children $children)
    {
        //
    }


    public function edit($child)
    {
        $editchild = Children::find($child)->first();
        return view('Parent.edit_child_acc',compact('editchild'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChildrenRequest  $request
     * @param  \App\Models\Children  $children
     * @return \Illuminate\Http\Response
     */
    public function update(StoreChildrenRequest $request, $child)
    {
        $val_request = $request->validated();

        $updatechild = Children::find($child)->where('parent_id',auth()->user()->id)->first();
        $updatechild->update($val_request);
        return redirect(route('Parent.getchilds'));
    }


    public function destroy($id)
    {
        $remove_child = Children::find($id)->delete();
        return redirect()->back();
    }

    public function chat(){
        return view('sweet-alert');
    }

}
