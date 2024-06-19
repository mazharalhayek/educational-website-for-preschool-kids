<?php

namespace App\Services;

use App\Models\Children;
use App\Traits\Response;
use App\Models\TutorChild;
use Illuminate\Support\Facades\Auth;

class ChildrenService
{
    use Response;
    public function ParentsChildren()
    {
        $childs = Children::where('parent_id', Auth::user()->id)
            ->with('my_parent')
            ->get();
        return $childs;
    }

    public function StoreNewStudent($request)
    {
        $val_request = $request->validated();

        $existing_child = Children::where('name', $val_request)
            ->where('parent_id', auth()->user()->id)
            ->first();

        if ($existing_child) {              //check if it's already added before.
            return $this->errorResponse('child already exists', 401);
        }

        if ($request->image != null) {      //check if the user uploaded an image while
            //creating a child profile because it's causing some troubles
            Children::create([
                'name'        => $val_request['name'],
                'parent_id'   => Auth::user()->id,
                'age'         => $val_request['age'],
                'password'    => $val_request['password'],
                'image'       => $request['image'],
            ]);

            return true;
        }

        Children::create([
            'name'        => $val_request['name'],
            'parent_id'   => Auth::user()->id,
            'age'         => $val_request['age'],
            'password'    => $val_request['password'],
        ]);

        return true;
    }

    public function UpdateChild($request, $child)
    {
        $val_request = $request->validated();
        $updatechild = Children::find($child);
        $updatechild->update($val_request);
    }

    public function DeleteChild($id)
    {
        $remove_child_tutor = TutorChild::where('child_id', $id)->delete();
        $remove_child = Children::find($id)->delete();
    }

    public function ChildReport()
    {
        $childs = Children::where('parent_id', Auth::user()->id)
            ->with('my_parent')
            ->with('my_progress')
            ->get();
        return $childs;
    }

    public function HireATutor($request, $id)
    {
        $already_hired = TutorChild::where('tutor_id', $id)->where('child_id', $request->child_id)->first();
        if ($already_hired) {
            return redirect()->back()->with('alert', 'Tutor already hired for this child!.');
        }

        $hire = TutorChild::create([
            'child_id' => $request['child_id'],
            'tutor_id' => $id,
        ]);
        return redirect()->back();
    }

    public function AlreadyHired()
    {
        
    }
}
