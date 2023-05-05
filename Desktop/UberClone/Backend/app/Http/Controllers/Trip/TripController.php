<?php

namespace App\Http\Controllers\Trip;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use Illuminate\Http\Request;
use App\Events\TripAccepted;
use App\Events\TripEnded;
use App\Events\TripLocationUpdated;
use App\Events\TripStarted;

class TripController extends Controller
{
    public function createTrip(Request $request)
    {
        $request->validate([
            'origin' => 'required',
            'destination' => 'required',
            'destination_name' => 'required',
        ]);

        $trip = $request->user()->trips()->create([
            'origin' => $request->origin,
            'destination' => $request->destination,
            'destination_name' => $request->destination_name,
        ]);

        return response()->json([
            'message' => 'Trip created successfully. Waiting for a driver to accept your trip.',
        ], 200);

    }

    public function getUserTrip(Request $request, Trip $trip)
    {

        //check if the trip belongs to the user

        if ($trip->user_id != $request->user()->id) {
            return response()->json([
                'message' => 'Oops! You are not authorized to view this trip.',
            ], 401);
        }
        if ($trip->driver && $request->user()->driver) {
        if ($trip->driver->id != $request->user()->driver->id) {
            return response()->json([
                'message' => 'Oops! You are not authorized to view this trip.',
            ], 401);
        }
    }

        return response()->json([
            'trip' => $trip,
        ], 200);

    }

    public function acceptTrip(Request $request, Trip $trip)
    {
        $request->validate([
            'driver_location' => 'required|string|max:255',
        ]);
        $trip->update([
            'driver_id' => $request->user()->id,
            'location' => $request->driver_location,
        ]);

        $trip->load('driver.user'); // return the driver and the user details

        TripAccepted::dispatch($trip);

        return response()->json([
            'trip' => $trip,
        ], 200);
    }

    public function startTrip(Request $request, Trip $trip)
    {
        $trip->update([
            'is_started' => true,
        ]);

        $trip->load('driver.user'); // return the driver and the user details for this trip

        TripStarted::dispatch($trip, $trip->user());
        return response()->json([
            'trip_status' => 'Trip has been started successfully',
        ], 200);

    }

    public function endTrip(Request $request, Trip $trip)
    {
        $trip->update([
            'is_complete' => true,
        ]);

        $trip->load('driver.user'); // return the driver and the user details for this trip

        TripEnded::dispatch($trip, $trip->user());

        return response()->json([
            'trip_status' => 'Trip has been completed successfully',
        ], 200);
    }

    public function location(Request $request, Trip $trip)
    {
        $request->validate([
            'driver_location' => 'required|string|max:255',
        ]);

        $trip->update([
            'location' => $request->driver_location,
        ]);

        $trip->load('driver.user'); // return the driver and the user details for this trip

        TripLocationUpdated::dispatch($trip, $trip->user());

        return response()->json([
            'trip' => $trip,
        ], 200);
    }
}
