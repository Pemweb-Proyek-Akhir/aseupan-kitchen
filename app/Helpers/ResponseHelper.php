<?php

namespace App\Helpers;

class ResponseHelper
{
    public static function baseResponse($message, $status, $data = null, $error = null)
    {
        $response = [
            'message' => $message,
            'status' => $status,
            'data' => $data,
            'error' => $error,
        ];

        return response()->json($response);
    }
}
