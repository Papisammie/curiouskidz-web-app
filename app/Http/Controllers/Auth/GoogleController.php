<?php
  
namespace App\Http\Controllers;
  
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\Models\User;

  
class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->where('email', $user->email)->first();
            
            $checkIfSelectAccountType = User::where('google_id', $user->id)
                                        ->where('email', $user->email)
                                        ->where('roles', NULL)
                                        ->first();
                                        
            if($checkIfSelectAccountType){
                
                Auth::login($checkIfSelectAccountType);
                $id = Auth::user()->id;

                return redirect('/googleProfileChangeRole/' .$id)->with('success', 'Assign your Account Type to enjoy the platform');
            }

            if($finduser){
     
                Auth::login($finduser);
    
                return redirect('/home')->with('success', 'Login Successfully');
     
            }else{

                $newUser = User::create([

                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'status'   => true,
                    

                ]);

                Auth::login($newUser);
                $id = $newUser->id;

                return redirect('/googleProfileChangeRole/' .$id)->with('success', 'Assign your Account Type to enjoy the platform');


            }


        } catch (Exception $e) {

            return redirect('/login')->with('error', 'Error getting your data from Google');

        }

    }


}