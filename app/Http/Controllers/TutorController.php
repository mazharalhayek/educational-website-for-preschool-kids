<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Tutor;
use App\Models\Message;
use App\Models\Parents;
use App\Models\Progress;
use App\Models\TutorChild;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TutorController extends Controller
{
    /**
     * Get students of the authenticated tutor
     * @param none
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function get_students()
    {
        $my_students = Tutor::where('id',Auth::id())->with('my_students')->first();
        return view('tutors.my_students',compact('my_students'));
    }

    /**
     * Change the authenticated user's profile pic
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update_pfp(Request $request)
    {
        $tutor_image = Tutor::where('id',Auth::id())->first();
        $tutor_image->image = $request->image;
        $tutor_image->save();
        return redirect(route('Tutor.updateinterface'));
    }

    /**
     * Remove the authenticated user's profile pic
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function remove_pfp()
    {
        $tutor_image = Tutor::where('id',Auth::id())->first();
        $tutor_image->image = null;
        $tutor_image->save();
        return redirect(route('Tutor.updateinterface'));
    }

    /**
     * Get the desired chat messages with a specific parent
     * @param mixed $id
     * @param mixed $pid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function chating($id,$pid=null)
    {
        $child = Auth::user()->user_type->my_students->where('id', $id)->first();
        if ($pid != null) {
           $chat = Auth::user()->allMyMessages($pid);
           $pu = Parents::where('id',$pid)->first();
            return view('chat',compact('child','chat','pu'));
        }
        return view('chat',compact('child'));
    }

    /**
     * Get the progress of a specific student
     * @param mixed $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function student_progress($id)
    {
        $student = Progress::where('child_id',$id)->get();
        return view('tutors.student_progress',compact('student'));
    }

}
