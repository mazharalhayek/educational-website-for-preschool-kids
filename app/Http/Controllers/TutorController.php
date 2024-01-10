<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Tutor;
use App\Models\Image;
use App\Models\TutorChild;
use App\Models\Message;
use App\Models\Progress;

class TutorController extends Controller
{

    public function get_students()
    {
        $my_students = Tutor::where('id',Auth::id())->with('my_students')->first();
        return view('tutors.my_students',compact('my_students'));
    }

    public function update_pfp(Request $request)
    {
        $tutor_image = Tutor::where('id',Auth::id())->first();
        $tutor_image->image = $request->image;
        $tutor_image->save();
        return redirect(route('Tutor.updateinterface'));
    }

    public function remove_pfp()
    {
        $tutor_image = Tutor::where('id',Auth::id())->first();
        $tutor_image->image = null;
        $tutor_image->save();
        return redirect(route('Tutor.updateinterface'));
    }
    public function chating()
    {
        return view('chat');
    }

    public function student_progress($id)
    {
        $student = Progress::where('child_id',$id)->get();
        return view('tutors.student_progress',compact('student'));
    }

}
