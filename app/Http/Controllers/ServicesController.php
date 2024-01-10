<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ServicesRequest;

class ServicesController extends Controller
{
    public function store(ServicesRequest $request, $type)
    {
        $validated = $request ->validated();
        $admin = Admin::pluck("id")->first();
            $service = Services::create([
                'sender_id' => Auth::user()->id,
                'responder_id' => $admin,
                'type' => $type,
                'content'=> $validated['content']
            ]);


        return redirect()->back();
    }

    public function destroy($id)
{
    $service = Services::findOrFail($id);
    $service->delete();

    return redirect()->back();
}


}
