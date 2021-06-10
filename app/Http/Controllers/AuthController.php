<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class AuthController extends Controller
{
    /***  Show the form for login user.  ***/
    /***************************************/
    public function loginView()
    {   
        return view('auth.login');
    }


    /***  Try to login user with provided credentials.  ***/
    /******************************************************/
    public function login(Request $request)
    {        
        $headers  = array('Accept' => 'application/json');
        $body     = $request->all();
        $url      = config('app.url').'api/login';  
        $response = \Unirest\Request::post($url, $headers, $body);

        // dd($response);

        $status  = $response->body->status;
        $message = $response->body->message;

        if ($status == 200) {

            $token   = $response->body->token;
            $user    = $response->body->user;
            session()->put('token', $token);
            session()->put('user', $user);

            $user_id = $user->id;

            if ($user_id == 1) {
                return redirect('admin/dashboard');
            }
            else{
                return redirect('user/bookings');
            }
        
        }

        else{
            return view('auth.login',['status' => $message]);
        }        
    }


    /***  Show the form for registering a new user.  ***/
    /***************************************************/
    public function registerView()
    {
        return view('auth.register');
    }


    /***  Try to register user with provided credentials.  ***/
    /*********************************************************/
    public function register(Request $request)
    {
        // dd($request->all());
        $headers  = array('Accept' => 'application/json');
        $body     = $request->all();
        $url      = config('app.url').'api/register';
        $response = \Unirest\Request::post($url, $headers, $body);

        // dd($response);

        $status = $response->body->status;

        if ($status == 200 ) {
            return redirect('admin/dashboard'); 
        } 
        else{
            $errors = $response->body->errors;
            Session::flash('errors',$errors);   
            return back();
        }  
    }


    /***  Logout user from system  ***/
    /*********************************/
    public function logout()
    {
        session()->flush();
        return redirect('/');
    }
    
}
