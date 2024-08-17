<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\User;
use App\Models\Tutor;
use App\Models\Message;
use App\Models\Parents;
use App\Models\Children;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * return the requested view
     * @param mixed $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index($id)
    {
        if (view()->exists($id)) {
            return view($id);
        } else {
            return view('404');
        }
    }

    /**
     * Get all users of a specific type and return a table view
     * @param mixed $type
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function users_accounts($type)
    {
        switch ($type) {
            case 'parent':
                $accounts = Parents::query()->get();
                return view('admin.parentslist', compact('accounts'));
            case 'children':
                $accounts = Children::query()->with('my_parent')->get();
                return view('admin.childrenlist', compact('accounts'));
            case 'tutor':
                $accounts = Tutor::query()->get();
                return view('admin.tutorslist', compact('accounts'));
            default:
                return view('404');
        }
    }

    /**
     * Get all feedbacks sent to the authenticated admin
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function displayFeedback($type)
    {
        if ($type == 'feedback') {
            $services = Services::where('type', $type)
                ->where('responder_id', Auth::id())
                ->with('service')
                ->paginate(5);
            return view('Admin.display-feedback', compact('services', 'type'));
        }
        $services = Message::getReportedMessages();

        return view('Admin.display-feedback', compact('services', 'type'));
    }

    /**
     * Return a view for adding a book record
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addBook()
    {
        return view('Admin.add-book');
    }

    /**
     * Restrict a user from using the website
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function BanUser($id)
    {
        $user = User::where('id', $id)->first()->delete();
        return redirect()->back();
    }

    /**
     * Get all pending media requests
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function manageMedia()
    {
        $medias = Media::where('state', 'pending')
            ->with('mediaSender', 'mediaReceiver')
            ->paginate(5);
        return view('admin.media', compact('medias'));
    }

    public function mediaState($id, $state)
    {
        $media = Media::where('id', $id)->first();
        $media->state = $state;
        $media->save();
        
        return redirect()->back();
    }

}
