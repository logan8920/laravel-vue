<?php

namespace App\Traits;

trait ResponseTrait
{
    /**
     * Send a success response.
     *
     * @param mixed $data
     * @param string $message
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendSuccess(string $message = 'Operation Successful', int $status = 200, $data = null)
    {
        $response = [
            'success' => true,
            'message' => $message
        ];

        if ($data) {
            $response['data'] = $data;
        }
        return response()->json($response, $status);
    }

    /**
     * Send an error response.
     *
     * @param string $message
     * @param int $status
     * @param mixed $errors
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendError($error = null, int $status = 400)
    {
        $errorMessage = [
            "200" => "OK",
            "201" => "Created",
            "202" => "Accepted",
            "204" => "No Content",
            "301" => "Moved Permanently",
            "302" => "Found",
            "304" => "Not Modified",
            "400" => "Bad Request",
            "401" => "Unauthorized",
            "403" => "Forbidden",
            "404" => "Not Found",
            "405" => "Method Not Allowed",
            "406" => "Not Acceptable",
            "408" => "Request Timeout",
            "409" => "Conflict",
            "410" => "Gone",
            "415" => "Unsupported Media Type",
            "422" => "Unprocessable Entity",
            "429" => "Too Many Requests",
            "500" => "Internal Server Error",
            "501" => "Not Implemented",
            "502" => "Bad Gateway",
            "503" => "Service Unavailable",
            "504" => "Gateway Timeout"
        ];
        
        $response = [
            "success"=> false,
            "message"=> $errorMessage[$status],
            "error"  =>$error
        ];
        
        if (env("APP_DEBUG") === false) {
            $response["error"] = $errorMessage[$status];
        }
        return response()->json($response, $status);
    }

    /**
     * Send a validation error response.
     *
     * @param \Illuminate\Contracts\Validation\Validator $validator
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendValidationError($validator)
    {
        return $this->sendError('Validation Error', 422, $validator->errors());
    }
}
