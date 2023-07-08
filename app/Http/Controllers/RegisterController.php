<?php

namespace App\Http\Controllers;

use App\Mail\WrabbitWelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function sendEmail(Request $request)
    {
        // dd("anything");
        // validate inputs
        // $validatedData = $request->validate([
        //     "email" => "required|email"
        // ]);

        $validator = Validator::make($request->all(), [
            "email" => [
                "email",
                "required",
                Rule::unique("users", "email")
            ],
        ]);

        if($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 422);
        }

        $email = $validator->getData()["email"];

        // send email
        Mail::to($email)->send(new WrabbitWelcomeEmail());

        return response()->json(["message" => "Hey, you got something for you! Check your inbox!"]);
    }
}
