<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Services;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ServicesRequest;

class ServicesController extends Controller
{
    public function store(ServicesRequest $request, $type)
    {
        $validated = $request->validated();
        $admin = Admin::inRandomOrder()->first();
        $service = Services::create([
            'sender_id' => Auth::user()->id,
            'responder_id' => $admin->id,
            'type' => $type,
            'content' => $validated['content']
        ]);
        session()->flash('success', 'Thanks for your feedback');

        return redirect()->back();
    }

    public function destroy($id)
    {
        $service = Services::findOrFail($id);
        $service->delete();
        session()->flash('success', 'removed successfuly');

        return redirect()->back();
    }
}
