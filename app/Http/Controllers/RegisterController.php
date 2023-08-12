<?php

namespace App\Http\Controllers;

use App\Mail\WrabbitWelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class RegisterController extends Controller
{

    public function index()
    {
        return view('wrabbit-welcome');
    }


    public function generateMagicLink(Request $request)
    {
        // validate inputs
        $validator = Validator::make($request->all(), [
            "email" => [
                "email",
                "required",
                // Rule::unique("users", "email")
            ],
            "create_user_token" => ["required"]
        ]);

        // check for validation errors
        if($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }


        $email = $validator->getData()["email"];
        $createUserToken = $validator->getData()["create_user_token"];

        // Generate a random token
        $token = Str::random(12);

        // Encrypt the token
        $encryptedToken = Crypt::encryptString($token);

        // Create a hash for the encrypted token
        $hash = Hash::make($encryptedToken);

        $data = collect([
            'email' => $email,
            'create_user_token' => $createUserToken,
            'magic_link_token' => $encryptedToken,
            'magic_link_hash' => $hash
        ]);

        // find user based on the email provided
        $user = User::where("email", $email)->first();

        // dd("does exist", $user);

        if(!$user) {
            return view("provide-name", ["data" => $data->all()]);
        }

        // update users token and hash
        $user->update($data->except("email", "create_user_token")->all());

        // Combine the encrypted token and hash for verification
        $magicLink = route('magic-link-login', [
            'email' => $user->email,
            'magic_link_token' => $user->magic_link_token, 
            'magic_link_hash' => $user->magic_link_hash
        ]);

        // send email
        Mail::to($email)->send(new WrabbitWelcomeEmail($magicLink));

        return redirect()->back()->with([
            "success" => "Email sent -> see INBOX!"
        ]);
    }


    public function createUser(Request $request) {

        $rules = [
            'name' => 'required|alpha|min:4|max:15',
            'create_user_token' => 'required|in:impossible',
            'magic_link_token' => 'required',
            'magic_link_hash' => 'required',
            'email' => 'email',
            // Other validation rules
        ];

        $messages = [
            'create_user_token.in' => 'Ops! You must SEND MAGIC LINK from HomePage',
            // Other custom error messages
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        // check for validation errors
        if($validator->fails()) {

            return redirect()->route('provide-name')
                         ->withErrors($validator)
                         ->with('data', $request->all());
        }

        $validated = $validator->safe()->except([
            "create_user_token"
        ]);

        // create user
        $user = User::create($validated);

        // Combine the encrypted token and hash for verification
        $magicLink = route('magic-link-login', [
            'magic_link_token' => $user->magic_link_token, 
            'magic_link_hash' => $user->magic_link_hash, 
            'email' => $user->email]);

        // send email
        Mail::to($user->email)->send(new WrabbitWelcomeEmail($magicLink));

        return redirect()->route('/')->with([
            "success" => "Email sent -> see INBOX!"
        ]);
    }


    public function provideName(Request $request) {
        $data = $request->session()->get('data');
        return view('provide-name', ["data" => $data]);
    }


    public function inLogin() {
        return view('in-login');
    }


    public function loginWithMagicLink(Request $request) {

        if(Auth::check()) {
            return redirect()->route('in-login')->with([
                "success" => "You are logged in. Congratulations!"
            ]);
        }

        // validation
        $rules = [
            'magic_link_token' => 'required',
            'magic_link_hash' => 'required',
            'email' => 'email',
            // Other validation rules
        ];

        $messages = [
            'magic_link_token.required' => 'Ops! You must SEND MAGIC LINK',
            'magic_link_hash.required' => 'Ops! You must SEND MAGIC LINK',
            'email.email' => 'Ops! You must SEND MAGIC LINK',
            // Other custom error messages
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        // check for validation errors
        if($validator->fails()) {

            return redirect()->route('/')->withErrors($validator);
        }
        
        // Retrieve the user by matching the hash and encrypted token
        $user = User::where('magic_link_hash', $validator->getData()['magic_link_hash'])
                    ->where('magic_link_token', $validator->getData()['magic_link_token'])
                    ->where('email', $validator->getData()['email'])
                    ->first();

        if(!$user) {
            return redirect()->route('/')->with([
                "fail" => "Ops! You must SEND MAGIC LINK"
            ]);
        }
    
        // Log in the user
        Auth::login($user);
        // Clear the hash and encrypted token
        $user->magic_link_hash = null;
        $user->magic_link_token = null;
        $user->save();

        return redirect()->route('in-login')->with([
            "success" => "You are logged in. Congratulations!"
        ]);
    }

    public function inLogout()
    {
        // log out user
        Auth::logout();
        
        return redirect()->route('/')->with([
            "success" => "You are logged out. See you again, my friend!"
        ]);
    }
}
