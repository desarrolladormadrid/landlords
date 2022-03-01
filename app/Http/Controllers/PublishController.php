<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Apartament;
use App\Http\Controllers\HelperController;
use Exception;

class PublishController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function publish($id)
    {

        return view('publish', compact('id'));
    }

    public function create(Request $request)
    {

        $validatedData = $request->validate([
            'title' => ['required']
        ]);

        $user_id = $request->user_id;
        $vadidateRole = HelperController::validateRole($user_id);

        if ($vadidateRole) {
            $this->createApartament($request);

            return redirect()->back()->with('message', 'Rent has been plublised');
        } else {

            return Redirect::back()->withErrors(['msg' => 'You don haver authoritation']);
        }
    }

    private function createApartament($request): void
    {

        try {
            $apartament =  new Apartament;
            $apartament->user_id = $request->user_id;
            $apartament->title = $request->title;
            $apartament->available = 1;
            $apartament->save();

            $this->createFeatures($request, $apartament);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    private function createFeatures($request, $apartament): void
    {

        try {
            if ($request->air > 0) $apartament->features()->attach($apartament->id, ['feature_id' => $request->air]);
            if ($request->heating > 0) $apartament->features()->attach($apartament->id, ['feature_id' => $request->heating]);
            if ($request->elevator > 0) $apartament->features()->attach($apartament->id, ['feature_id' => $request->elevator]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
