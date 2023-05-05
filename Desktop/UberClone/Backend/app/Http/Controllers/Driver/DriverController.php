<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function show(Request $request)
    {
       $user = $request->user();
       $user->load('driver');

         return response()->json([
             'user' => $user,
         ], 200);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'make' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'license_plate' => 'required|string|max:255',
        ]);

        $user = $request->user();

        $user->update($request->only('name'));

        $user->driver()->updateOrCreate(
            $request->only('year', 'model', 'make', 'color', 'license_plate')
        );

        $user->load('driver');

        return response()->json([
            'user' => $user,
        ], 200);

    }
}
