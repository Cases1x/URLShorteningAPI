<?php

namespace App\Http\Helper;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidationHelper
{

    // Checking for validation errors
    // Request = Request object
    // Rules = Validation rules
    public static function validate(Request $request, array $rules)
    {
        // Return the message fit for for the frontend
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        return null;

        // $validator = Validator::make($request->all(), $rules);
        // return $validator->fails() ? response()->json(['Validation Error' => $validator->errors()], 422) : null;
    }
}
