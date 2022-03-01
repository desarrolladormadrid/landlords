<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Apartament;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Exception;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }

    public function filter(Request $request): Renderable
    {

        $air = $request->air;
        $elevator = $request->elevator;
        $heating = $request->heating;

        $data = HelperController::filterFeatures($request);

        return view('home', compact('data', 'air', 'elevator', 'heating'));
    }
}
