<?php

namespace App\Http\Controllers;

use App\Models\Country;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::paginate(25);

        return view('country.list', compact('countries'));
    }
}
