<?php

namespace App\Http\Services;

class ResponseService
{
    public function send_response($success,$response_code,$message,$data)
    {
        return response()->json(
            array(
                'success'=>$success,
                'response_code'=>$response_code,
                'message'=>$message,
                'data' => $data
            ),200
        );
    }

}
