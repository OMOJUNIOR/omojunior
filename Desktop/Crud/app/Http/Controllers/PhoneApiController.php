<?php

namespace App\Http\Controllers;

use App\Http\Response\ApiError;
use App\Http\Response\ApiSuccess;
use App\Models\PhoneBook;

class PhoneApiController extends Controller
{
    public function getPhone()
    {
        $phone = PhoneBook::where('id', '=', 5)->get();

        $phone = $phone->isEmpty() ? (new ApiError)->notFoundResponse() : (new ApiSuccess)->sucessResponse($phone);

        return $phone;
    }
}
