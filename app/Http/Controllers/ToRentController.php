<?php

namespace App\Http\Controllers;

use App\Models\Apartament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\HelperController;
use Exception;

class ToRentController extends Controller
{
    public function requestRent(Request $request)
    {

        try {
            $apartament = Apartament::with('user')->where('id', '=', $request->id)->first();
        } catch (Exception $e) {
            dd($e->getMessage());
        }

        return view('toRent', compact('apartament'));
    }

    public function toRent(Request $request)
    {

        $request->validate([
            'date' => ['required', 'regex: /^\d{4}[\-\/\s]?((((0[13578])|(1[02]))[\-\/\s]?(([0-2][0-9])|(3[01])))|(((0[469])|(11))[\-\/\s]?(([0-2][0-9])|(30)))|(02[\-\/\s]?[0-2][0-9]))$/'],
            'name' => ['required'],
        ]);

        $vaditateAge = HelperController::validateAge($request->date);

        if (!$vaditateAge) {
            return Redirect::back()->withErrors(['msg' => 'You don haver authoritation by age']);
        }

        $this->saveApartament($request);

        return redirect()->back()->with('message', 'Rent has been aproved');
    }

    private function saveApartament($request)
    {

        try {
            $apartament = Apartament::where('id', '=', $request->id_apartament)->first();
            $apartament->available = 0;
            $apartament->save();
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
