<?php

namespace App\Helpers;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Routing\ResponseFactory as RoutingResponseFactory;

class ResponseHelper
{
    public static function baseResponse($message, $status, $data = null, $error = null,)
    {
        $response = [
            'message' => $message,
            'status' => $status,
            'data' => $data,
            'error' => $error,
        ];

        return response()->json($response, $status);
    }
}
