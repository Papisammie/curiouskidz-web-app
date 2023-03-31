<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\LoginNotification;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

     protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



       /** 
     * Login POST
     */
    public function login(Request $request)
    {
    
        $user = User::where('email', $request->email)->first();
        $dataAdmin = [
            'email' => $request->email,
            'password' => $request->password,
            'roles' => "admin",
        ];

        $data = [
            'email' => $request->email,
            'password' => $request->password,
            'status' => true,
        ];
        
        $dataNoRoleAfterGoogleSign = [
            'email' => $request->email,
            'password' => $request->password,
            'roles' => NULL,
        ];
        
       
 
        if (auth()->attempt($dataAdmin)) {
            $token = auth()->user()->createToken('CURIOUSKIDZ')->accessToken;

            //Mail::to($data->email)->send(new LoginNotification($data));
            return redirect('/admin/home')->with('success', 'Admin Login Successful');


        }elseif (auth()->attempt($data)) {
            $token = auth()->user()->createToken('CURIOUSKIDZ')->accessToken;

            //Mail::to($request->email)->send(new LoginNotification($data));
            return redirect('/home')->with('success', 'Login Successful');

        }elseif(User::where('status', false)->where('email', $request->email)->first()) {

            return back()->with('error', 'You have been deactivated, contact admin');
    
            
        }elseif (auth()->attempt($dataNoRoleAfterGoogleSign)) {
            
            $userID = Auth::user()->id;

            return redirect('/googleProfileChangeRole/'. $userID)->with('success', 'Choose Account Type Before you can enjoy pur platform');


        } else {

            return back()->with('error','Dear User, Your Email or Password is incorrect. Retry with Correct Information');
        }
    }   


    public function loginAsGuest(Request $request)
    {

        $dataGuest = [
            'email' => "guest@curiouskidz.com.ng",
            'password' => "12345678",
            'roles' => "guest",
        ];

        if (Auth::attempt($dataGuest)) {
            $token = auth()->user()->createToken('CURIOUSKIDZ')->accessToken;

            return redirect('/home')->with('success', 'Login Successful');

        }else{
            return back()->with('error', 'Login Error');

        }            

    }


    


        /**
     * Logout, Clear Session, and Return.
     *
     * @return void
     */
    public function logout()
    {
        // $user = Auth::user();
        // Log::info('User Logged Out. ', [$user]);
        Auth::logout();
        Session::flush();

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
    }
    
   
}
