<?php

namespace App\Http\Response;

class ApiSuccess
{
    public function sucessResponse($data = null)
    {
        return response()->json([
            'message' => 'Success',
            'data' => $data = null ? [] : $data,
        ], 201);
    }
}
