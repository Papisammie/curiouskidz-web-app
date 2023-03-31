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
            
            $finduser = User::where('google_id', $user->id)->first();
  
            if($finduser){
                
                Auth::login($finduser);
                return redirect()->intended('home');
                
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

            return back()->with('error', 'Error getting your data from Google');

        }

    }


}