<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use App\Models\Apartament;
use Illuminate\Http\Request;
use Exception;

class ApiController extends Controller
{
    public function index(): object
    {

        $dataApartament = Apartament::all();

        return response()->json($dataApartament);
    }

    public function available(): object
    {

        $dataApartament = Apartament::where('available', '>', 0)->get();

        return response()->json($dataApartament);
    }

    public function apartament($id): object
    {

        $dataApartament = Apartament::where('id', '=', $id)->get();

        return response()->json($dataApartament);
    }
    public function apartamentsFilter(Request $request): object
    {

        $data = HelperController::filterFeatures($request);

        return response()->json($data);
    }
}
