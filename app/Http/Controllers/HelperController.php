<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Apartament;
use Exception;

class HelperController extends Controller
{
    static function validateRole($id): bool
    {

        $user = User::with('roles')->where('id', '=', $id)->first();
        foreach ($user->roles as $item) {
            if ($item->pivot->role_id == 1) {
                return true;
            }
            return false;
        }
    }

    static function validateAge($birthdate): bool
    {

        list($year, $month, $day) = explode("/", $birthdate);
        $year_diff  = date("Y") - $year;
        $month_diff = date("m") - $month;
        $day_diff   = date("d") - $day;

        if ($day_diff < 0 || $month_diff < 0) $year_diff--;

        if ($year_diff >= 18) {
            return true;
        } else {
            return false;
        }
    }

    static function filterFeatures($request): object
    {

        try {
            $data = Apartament::with('features')
                ->orwhereRelation('features', 'feature_id', $request->air)
                ->orwhereRelation('features', 'feature_id', $request->elevator)
                ->orwhereRelation('features', 'feature_id', $request->heating)
                ->paginate(10);
        } catch (Exception $e) {
            dd($e->getMessage());
        }

        return $data;
    }
}
