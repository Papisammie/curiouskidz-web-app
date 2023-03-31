<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Course;
use App\Models\WatchLater;
use App\Models\UsersOnGamified;
use App\Models\Gamify;
use App\Models\Badges;
use App\Models\VideoCounter;
use App\Models\Notification;
use App\Models\Newsletter;
use App\Models\Testimonial;
use App\Models\Message;
use App\Models\ChatReply;
use Auth;
use DB;
use Illuminate\Support\Carbon;

class SearchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }




    public function search(Request $request)
    {

        if($request->q){

            $q = $request->q;
            $notifier = Notification::where('user_id', Auth::user()->id)->get();
            $course = Course::where('title','LIKE','%'.$q.'%')->get();

            if(count($course) > 0){
                return view('search', [
                    'course' => $course,
                    'notifier' => $notifier,
    
                ])->withQuery ( $q );
            }else{
                return back()->with('error','No Course Search found. Try to search again !');
            }


        }elseif($request->q || $request->cat){
            $q = $request->q;
            $cat = $request->cat;
            $notifier = Notification::where('user_id', Auth::user()->id)->get();
            $course = Course::where('title','LIKE','%'.$q.'%')
                            ->orWhere('cat_id','LIKE','%'.$cat.'%')
                            ->get();


            if(count($course) > 0){
                return view('search', [
                    'course' => $course,
                    'notifier' => $notifier,

                ])->withQuery ( $q );
            }else{
                return back()->with('error','No Course Search found. Try to search again !');
           }

         
        }elseif($request->q || $request->ageGroup){
            $q = $request->q;
            $class = $request->ageGroup;
            $notifier = Notification::where('user_id', Auth::user()->id)->get();
            $course = Course::where('title','LIKE','%'.$q.'%')
                            ->orWhere('class','LIKE','%'.$class.'%')
                            ->get();


            if(count($course) > 0){
                return view('search', [
                    'course' => $course,
                    'notifier' => $notifier,

                ])->withQuery ( $q );
            }else{
                return back()->with('error','No Course Search found. Try to search again !');
           }

        }elseif($request->q || $request->ageGroup || $request->cat){
            $q = $request->q;
            $class = $request->ageGroup;
            $notifier = Notification::where('user_id', Auth::user()->id)->get();
            $course = Course::where('title','LIKE','%'.$q.'%')
                            ->orWhere('class','LIKE','%'.$class.'%')
                            ->orWhere('cat_id','LIKE','%'.$cat.'%')
                            ->get();


            if(count($course) > 0){
                return view('search', [
                    'course' => $course,
                    'notifier' => $notifier,

                ])->withQuery ( $q );
            }else{
                return back()->with('error','No Course Search found. Try to search again !');
           }

        }else{

            return back()->with('error','No Course Search found. Try to search again !');

        }
    

       
    }






    public function searchEdu(Request $request)
    {

        if($request->q){

            $q = $request->q;
            $notifier = Notification::where('user_id', Auth::user()->id)->get();
            $course = Course::where('title','LIKE','%'.$q.'%')
                            ->where('libraryGroup', 'educational')
                            ->where('status', True)
                            ->get();

            if(count($course) > 0){
                return view('search', [
                    'course' => $course,
                    'notifier' => $notifier,
    
                ])->withQuery ( $q );
            }else{
                return back()->with('error','No Course Search found. Try to search again !');
            }


        }
        
        
        
        if($request->q  && $request->cat){
            $q = $request->q;
            $cat = $request->cat;
            $notifier = Notification::where('user_id', Auth::user()->id)->get();
            $course = Course::where('title','LIKE','%'.$q.'%')
                            ->orWhere('cat_id','LIKE','%'.$cat.'%')
                            ->where('libraryGroup', 'educational')
                            ->where('status', True)
                            ->get();


            if(count($course) > 0){
                return view('search', [
                    'course' => $course,
                    'notifier' => $notifier,

                ])->withQuery ( $q );
            }else{
                return back()->with('error','No Course Search found. Try to search again !');
           }

        }
        
        
        if($request->cat && $request->ageGroup){
            $q = $request->cat;
            $ageGroup = $request->ageGroup;
            
            $notifier = Notification::where('user_id', Auth::user()->id)->get();
            $course = Course::where('cat_id','LIKE','%'.$q.'%')
                            ->Where('ageGroup','LIKE','%'.$ageGroup.'%')
                            // ->where('libraryGroup', 'educational')
                            // ->where('status', True)
                            ->get();


            if(count($course) > 0){
                return view('search', [
                    'course' => $course,
                    'notifier' => $notifier,

                ])->withQuery ( $q );
            }else{
                return back()->with('error','No Course Search found. Try to search again !');
           }

        }
        
        
        if($request->cat){
    
            $getCat = Category::where('title', $request->cat)->first();
            $getCourse = Course::where('cat_id', $getCat->title)->where('status', true)->where('libraryGroup', "educational")->paginate(50);
            $notifier = Notification::where('user_id', Auth::user()->id)->get();

            return view('viewCoursesInCategory',[
                'getCat' => $getCat,
                'getCourse' => $getCourse,
                'notifier' => $notifier,
            ]);
            
        }
        
        
         if($request->ageGroup){
    

            $getCourse = Course::where('status', true)->where('libraryGroup', "educational")->where('ageGroup', $request->ageGroup)->paginate(50);
            $notifier = Notification::where('user_id', Auth::user()->id)->get();

            return view('viewCoursesInCategory',[
                'getCourse' => $getCourse,
                'notifier' => $notifier,
            ]);
            
        }
        
        
        if($request->q && $request->ageGroup  &&  $request->cat){
            $q = $request->q;
            $ageGroup = $request->ageGroup;
            $notifier = Notification::where('user_id', Auth::user()->id)->get();
            $course = Course::where('title','LIKE','%'.$q.'%')
                            ->orWhere('ageGroup','LIKE','%'.$ageGroup.'%')
                            ->orWhere('cat_id','LIKE','%'.$cat.'%')
                            ->where('libraryGroup', 'educational')
                            ->where('status', True)
                            ->get();


            if(count($course) > 0){
                return view('search', [
                    'course' => $course,
                    'notifier' => $notifier,

                ])->withQuery ( $q );
            }else{
                return back()->with('error','No Course Search found. Try to search again !');
           }

        }else{

            return back()->with('error','No Course Search found. Try to search again !');

        }
    

       
    }


}