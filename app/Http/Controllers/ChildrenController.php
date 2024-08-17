<?php

namespace App\Http\Controllers;


use App\Models\Book;
use App\Models\Tutor;
use App\Models\Children;
use App\Traits\Response;
use App\Models\TutorChild;
use Illuminate\Http\Request;
use App\Services\ChildrenService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreChildrenRequest;


class ChildrenController extends Controller
{
    use Response;

    protected $ChildrenServices;

    /**
     * Define the constructor to use the service.
     * @param ChildrenService
     * @return none
     */
    public function __construct(ChildrenService $ChildrenServices)
    {
        $this->ChildrenServices = $ChildrenServices;
    }

    /**
     * Get the authenicated parent's children.
     * [ChildrenServices => ParentsChildren]
     * @param none
     * @return \view
     */
    public function index(): \Illuminate\View\View|\Illuminate\Http\RedirectResponse
    {
        try {
            $childs = $this->ChildrenServices->ParentsChildren();
            return view('Children_Cards', compact('childs'));
        } catch (\Exception $e) {
            return redirect()->back()->with('alert', $e);
        }
    }

    /**
     * Return a view to create a new student account.
     * [ChildrenServices => none]
     * @param none
     * @return \view
     */
    public function create(): \Illuminate\View\View
    {
        return view('Parent.newchild');
    }

    /**
     * Store the new student coming from the create view.
     * [ChildrenServices => StoreNewStudent]
     * @param StoreChildrenRequest
     * @return \route
     */
    public function store(StoreChildrenRequest $request): \Illuminate\View\View|\Illuminate\Http\RedirectResponse
    {
        $this->ChildrenServices->StoreNewStudent($request);
        return redirect(route('Parent.getchilds'));
    }

    /**
     * Return a view to edit the student info.
     * [ChildrenServices => none]
     * @param Children
     * @return \view
     */
    public function edit($child): \Illuminate\View\View|\Illuminate\Http\RedirectResponse
    {
        try {
            $editchild = Children::find($child);
            return view('Parent.edit_child_acc', compact('editchild'));
        } catch (\Exception $e) {
            return redirect()->back()->with('alert', $e);
        }
    }

    /**
     * Update child's info with the new variables.
     * [ChildrenServices => UpdateChild]
     * @param Children
     * @param StoreChildrenRequest
     * @return \view
     */
    public function update(StoreChildrenRequest $request, $child): \Illuminate\View\View|\Illuminate\Http\RedirectResponse
    {
        try {
            $this->ChildrenServices->UpdateChild($request, $child);
            return redirect(route('Parent.getchilds'));
        } catch (\Exception $e) {
            return redirect()->back()->with('alert', $e);
        }
    }

    /**
     * Delete an exisiting child.
     * [ChildrenServices => UpdateChild]
     * @param Children
     * @return \route
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        try {
            $this->ChildrenServices->DeleteChild($id);
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('alert', $e);
        }
    }

    /**
     * Return info of a specific tutor and the authenticated user's children.
     * [ChildrenServices => none ]
     * @param Tutor
     * @return \view
     */
    public function tutor_info($id): \Illuminate\View\View|\Illuminate\Http\RedirectResponse
    {
        try {
            $specific_tutor = Tutor::where('id', $id)->first();
            $which_child = $this->ChildrenServices->ParentsChildren();
            return view('tutor_info', compact('specific_tutor'), compact('which_child'));
        } catch (\Exception $e) {
            return redirect()->back()->with('alert', $e);
        }
    }

    /**
     * Hire a tutor for a specific child (Create in TutorChild).
     * [ChildrenServices => HireATutor ]
     * @param Tutor
     * @param Request
     * @return \route
     */
    public function hire_a_tutor(Request $request, $id): \Illuminate\Http\RedirectResponse //TODO move to Tutor controller
    {
        try {
            return $this->ChildrenServices->HireATutor($request, $id);
        } catch (\Exception $e) {
            return redirect()->back()->with('alert', $e);
        }
    }

    /**
     * Return the hired tutors for a specific child.
     * [ChildrenServices => none ]
     * @param Tutor
     * @param Request
     * @return \view
     */
    public function already_hired($id): \Illuminate\View\View  //TODO move to Tutor controller
    {
        $thisuserchild = Children::where('parent_id', Auth::id())->where('id', $id)
            ->with('my_tutors')
            ->first();
        $all_tutors = Tutor::all()->count();
        $reviews = [];
        foreach ($thisuserchild->my_tutors as $tutor) {
            $votes = TutorChild::where('tutor_id', $tutor->id)
                ->whereNotNull('review')
                ->count();
            $reviews[] = [
                'tutor_id' => $tutor->id,
                'votes' => $votes,
                'percentage' => ($votes * $all_tutors) * 100,
            ];
        }
        $reviews = collect($reviews);

        return view('hired_tutors', compact('thisuserchild', 'reviews'));
    }

    /**
     * Return a view of all available tutors
     * @param none
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function display_tutors() //TODO move to Tutor controller
    {
        $tutors = Tutor::query()->get();
        return view('tutors_cards', compact('tutors'));
    }

    /**
     * Return a view for chatting
     * @param none
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function chat($id, $tid = null)
    {
        $child = Auth::user()->user_type->mychidlren->where('id', $id)->first();
        if ($tid != null) {
            $chat = Auth::user()->allMyMessages($tid);
            $tu = Tutor::where('id', $tid)->first();
            return view('chat', compact('child', 'chat', 'tu'));
        }
        return view('chat', compact('child'));
    }

    /**
     * Unhire an already hired tutor for a specific child(remove from tutorchild model)
     * @param \Illuminate\Http\Request $request
     * @param Children
     * @return mixed|\Illuminate\Http\RedirectResponse
     */
    public function unhire_a_tutor(Request $request, $id) //TODO move to Tutor controller
    {
        $tutor = TutorChild::where('tutor_id', $request->tutor_id)->where('child_id', $id)->delete();
        session()->flash('success', 'Tutor unhired successfuly');
        return redirect()->back();
    }

    /**
     * Get the progress report for all the children of the authenticated user.
     * [ChildrenServices => ChildReport]
     * @param none
     * @return \view
     */
    public function viewReports(): \Illuminate\View\View|\Illuminate\Http\RedirectResponse
    {
        try {
            $childs = $this->ChildrenServices->ChildReport();
            return view('Parent.progress_reports', compact('childs'));
        } catch (\Exception $e) {
            return redirect()->back()->with('alert', $e);
        }
    }

    public function buyBooks() //TODO move to Book controller
    {
        $books = Book::all();
        return view('books_purchase', compact('books'));
    }

    /**
     * Return a view of the wallet info of the authenticated user.
     * [ChildrenServices => none]
     * @param none
     * @return \view
     */
    public function viewWallet(): \Illuminate\View\View
    {
        return view('Parent.view_wallet');
    }

    /**
     * Return a view to create an issue feedback.
     * [ChildrenServices => none]
     * @param none
     * @return \view
     */
    public function issueFeedback(): \Illuminate\View\View
    {
        return view('Parent.issue_feedback');
    }

    /**
     * Give a specific hired tutor a review
     * @param Request $request
     * @param $id
     * @param $cid
     * @return \Illuminate\Http\RedirectResponse
     */
    public function tutorReview(Request $request, $id, $cid)
    {
        $request->validate([
            'review' => 'integer|min:0|max:5',
        ]);

        $tutor = TutorChild::where('tutor_id', $id)->where('child_id', $cid)->first();

        if ($tutor->review == null) {
            $tutor->review = $request->review;
            $tutor->save();

            session()->flash('success', 'Review sent successfully');
            return redirect()->back();
        }

        return redirect()->back()->withErrors('Tutor already received a review before');
    }
}
