<?php

namespace App\Traits;

trait ResponseAPI
{
   
    public function sendResponse($result , $message,$count=0)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
            'count' => $count,
        ];
        return response()->json($response , 200);
    }
 
    public function sendError($error , $errorMessage=[] , $code = 404)
    {
        $response = [
            'success' => false,
            'data' => $error
        ];
        if (!empty($errorMessage)) {
            $response['data'] = $errorMessage;
        }
        return response()->json($response , $code);
    }
}