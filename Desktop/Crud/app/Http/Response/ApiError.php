<?php

namespace App\Http\Response;

class ApiError
{
    public function notFoundResponse()
    {
        return response()->json([
            'success' => false,
            'message' => 'Phone not found',
        ], 404);
    }
}
