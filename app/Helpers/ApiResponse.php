<?php

if (!function_exists('successResponse')) {
    function successResponse($statusCode, $message = "", $result = [], $otherData = [])
    {
        $response = [
            "status" => $statusCode,
            "message" => $message,
            "result" => $result,
        ];
        if ($otherData) {
            $response['other_data'] = $otherData;
        }
        return $response;
    }
}

if (!function_exists('errorResponse')) {
    function errorResponse($statusCode, $message, $result = [])
    {
        return [
            "status" => $statusCode,
            "message" => $message,
            "result" => $result,
        ];
    }
}

if (!function_exists('errorResponseNull')) {
    function errorResponseNull($statusCode, $message, $result = [])
    {
        return [
            "status" => $statusCode,
            "message" => $message,
            "result" => $result ? $result : null,
        ];
    }
}

if (!function_exists('catchResponse')) {
    function catchResponse($statusCode, $message = "", $result = [])
    {
        return [
            "status" => $statusCode,
            "message" => $message,
            "result" => $result,
        ];
    }
}

if (!function_exists('validationResponse')) {
    function validationResponse($statusCode, $message, $result)
    {
        return response()->json(["message" => $message, "result" => $result], $statusCode);
    }
}

if (!function_exists('finalResponse')) {
    function finalResponse($result)
    {
        return response()->json($result, $result['status']);
    }
}
