<?php

namespace App\Http\Responses;

use App\Utils\Constants;
use Illuminate\Http\JsonResponse;

class ApiResponse
{
    public static function success($data = null, $message = Constants::SUCCESS, $status = 201): JsonResponse
    {
        return response()->json([
            "status" => $status,
            "message" => $message,
            "response" => $data,
            "errors" => null
        ], $status);
    }

    public static function error($errors = [], $message = Constants::FAILED, $status = 400): JsonResponse
    {
        return response()->json([
            "status" => $status,
            "message" => $message,
            "response" => null,
            "errors" => $errors
        ], $status);
    }
}
