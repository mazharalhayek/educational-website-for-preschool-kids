<?php

namespace App\Http\Controllers;


use App\Models\Children;
use App\Models\TutorChild;
use App\Models\Tutor;
use App\Http\Requests\StoreChildrenRequest;
use App\Http\Requests\UpdateChildrenRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
        $remove_child_tutor = TutorChild::where('child_id',$id)->delete();
        $remove_child = Children::find($id)->delete();
        return redirect()->back();
    }

   
    public function tutor_info($id)
    {
        $specific_tutor = Tutor::where('id',$id)->first();
        $which_child = Children::where('parent_id',Auth::id())->get();
        return view('tutor_info',compact('specific_tutor'),compact('which_child'));
    }

    public function hire_a_tutor(Request $request,$id)
    {
        $hire = TutorChild::create([
            'child_id' => $request['child_id'],
            'tutor_id' => $id,
        ]);
        return redirect()->back();
    }

    public function already_hired()
    {
        // $thisuserchild = Children::where('parent_id',Auth::id())->with('teached_by')->get();
        // dd($thisuserchild);
        $parents_child = Children::where('parent_id',Auth::id())->get();

        foreach ($parents_child as $key)
        {
            $tutors_child = TutorChild::where('child_id',$key->id)->get();
        }

        foreach ($tutors_child as $key)
        {
            $child = Children::where('id',$key->child_id)->get();
        }

        foreach ($tutors_child as $key)
        {
            $tutor = Tutor::where('id',$key->tutor_id)->get();
        }

//        $childtutor = TutorChild::with('teached_by','teaches')->get();
        return view('hired_tutors',compact('child'),compact('tutor'));
    }

    public function display_tutors()
    {
        $tutors = Tutor::query()->get();
        return view('tutors_cards',compact('tutors'));
    }

    public function chat(){
        return view('chat');
    }


    public function viewReports(){
        $childs = Children::where('parent_id',Auth::user()->id)->with('my_parent')->get();
        return view('Parent.progress_reports', compact('childs'));
    }
    public function buyBooks(){
        return view ('Parent.buy_books'); 
    }

    public function viewWallet(){
        return view('Parent.view_wallet'); 
    }
    public function issueFeedback(){
        return view('Parent.issue_feedback');
    }

}
