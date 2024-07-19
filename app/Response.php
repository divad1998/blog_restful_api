<?php

namespace App;

class Response
{
    static function response($status = true, $message = "Ok.", $data = [], $code = 200) {
        return response()->json([
            "status" => $status,
            "message" => $message,
            "data" => $data
        ], $code);
    }
}
