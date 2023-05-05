<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\LoginNeedsVerification;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function userLogin(Request $request)
    {
       //validate the phone number

       $request->validate([
           'phone_number' => 'required|numeric|min:10',
       ]);

       // find or create the user with the phone number

         $user = User::firstOrCreate([
             'phone_number' => $request->phone_number,
             'login_code'=> '123456' // default verification code for testing purposes
         ]);

         if (! $user) {
             return response()->json([
                 'message' => 'Oops! User could not be found or created with the phone number provided.',
             ], 401);
         }

       // send the user a verification code via SMS

         $user->notify(new LoginNeedsVerification());

         // return the user and the verification code with a response .

         return response()->json(['message' => 'Verification code sent to your phone number'.' '.$user['phone_number']]);

    }

    public function verifyLogin(Request $request)
    {
        // validate the phone number and the verification code

        $request->validate([
            'phone_number' => 'required|numeric|min:10',
            'login_code' => 'required|numeric|min:6',
        ]);

        // find the user with the phone number

        $user = User::where('phone_number', $request->phone_number)
                      ->where('login_code', $request->login_code)->first();

        if (! $user) {
            return response()->json([
                'message' => 'Oops! invalid verification token.',
            ], 401);
        }

        // update the user's verification code to null

        $user->update([
            'login_code' => null,
        ]);

       $token = $user->createToken($request->login_code)->plainTextToken;

        // return the user with a response

        return response()->json([
            'message' => 'Verification successful.',
            'user' => $user,
            'token' => $token,
        ], 200);

    }

    public function getUser(Request $request)
    {
      $user = $request->user();

        return response()->json([
            'user' => $user,
        ], 200);
    }
}
