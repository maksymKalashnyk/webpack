<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\Models\Country;

class CountryController extends Controller
{
    public function getAllCountries()
    {
        $countries = Country::all();
        return response()->json($countries)->setStatusCode(200);
    }
}
