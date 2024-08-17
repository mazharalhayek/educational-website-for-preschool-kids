<?php

namespace App\Http\Controllers;

use App\Models\Children;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\Response;
use App\Models\Progress;
use App\Models\Parents;


class StudentDashboardController extends Controller
{
    public function child_interface($id)
    {
        try {
            $child = Children::find($id);
            return view('Children.dashboard', compact('child'));
        } catch (\Exception $e) {
            return redirect()->back()->with('alert', $e);
        }
    }

    public function getProfile($id)
    {
        $child = Children::find($id);

        if (!$child) {
            abort(404);
        }
        return view('Children.child-profile', compact('child'));
    }

    public function subject_page($subject, $child)
    {
        $child = Children::where('id', $child)->first();
        return view('Children.lesson_videos', compact('subject'), compact('child'));
    }

    public function getBooks($id)
    {
        $child = Children::find($id);
        $parent_books = Parents::where('id', Auth::id())->with('books')->first();
        $purchased_books = $parent_books->books;
        return view('Children.books-main', compact('child'), compact('purchased_books'));
    }

    public function viewReport($id)
    {
        $child = Children::where('id', $id)->with('my_progress')->first();
        return view('Children.progress-report', compact('child'));
    }

    public function increase_progress($child_id, $role)
    {
        $child_progress = Progress::where('child_id', $child_id)
            ->where('role', $role)->first();

        if ($child_progress) {
            $child_progress->grade = $child_progress->grade + 10;
            $child_progress->save();
            return redirect()->back();
        }

        $child_progress = Progress::create([
            'child_id' => $child_id,
            'grade' => 10,
            'role' => $role,
        ]);
        session()->flash('success', 'Your progress increased by 10 😃');

        return redirect()->back();
    }

    public function log_out()
    {
        return redirect()->back();
    }

    public function getRecivedMedia($id)
    {
        $medias = Media::where('student_id', $id)->get();
        $child = Children::where('id', $id)->first();
        return view('Children.media', compact('medias', 'child'));
    }
}

;
