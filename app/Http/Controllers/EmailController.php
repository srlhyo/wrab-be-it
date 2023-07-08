<?php

namespace App\Http\Controllers;

use App\Mail\WrabbitWelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendWelcomeEmail(Request $request)
    {
        // Validate the form input to ensure that it contains a valid email address
        $request->validate([
            'email' => 'required|email',
        ]);
        
        // Get the email address from the form input
        $email = $request->input('email');
        
        // Render the welcome email template with the user's name and your company name
        // $data = [
        //     'name' => 'Boss Lhyo',
        //     'company_name' => 'Wrabbit LTD',
        // ];

        // $content = view('emails.wrabbit-welcome-email', $data)->render();

        $content = new WrabbitWelcomeEmail("Boss Lhyo", "Wrabbit LTD");
        // dd($content);
        
        // Send the email using Laravel's built-in Mailable facade
        Mail::to($email)->send($content);
        
        // Redirect the user back to the form with a success message
        return redirect()->back()->with('success', 'Welcome email sent!');
    }
}
