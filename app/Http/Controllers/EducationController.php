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
use Illuminate\Support\Facades\Hash;

class EducationController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //For Guest Only
                $getAllCatForGuest = Category::get();
                $getLatestCoursesForGuest = Course::where('status', true)->where('libraryGroup', "educational")->latest()->get();
                $mostwatchForGuest = VideoCounter::where('libraryGroup', "educational")->latest()->get();
                
                
       //For Auth Users Only     
        $getAllCat = Category::where('libraryGroup', 'educational')->get();
        
        $getwatchLater = DB::select("SELECT * FROM courses INNER JOIN watch_later  WHERE courses.id = watch_later.course_id");
        $notifier = Notification::where('user_id', Auth::user()->id)->get();
        $mostwatch = VideoCounter::where('ageGroup', Auth::user()->class)
                                ->where('libraryGroup', "educational")
                                ->latest()
                                ->get();
                                
        $mostWatchCounter = $mostwatch->count();
        $getLatestCourses = Course::where('status', true)->where('class', Auth::user()->class)->latest()->get();
        $testimonial = Testimonial::get();

        $getCoursesBasedOnLibrary = Course::where('status', true)
                                        ->where('ageGroup', Auth::user()->class)
                                        ->latest()
                                        ->get();
        
        
            return view('educationLibrary',[
                'getAllCat' => $getAllCat,
                'getwatchLater' => $getwatchLater,
                'notifier' => $notifier,
                'mostwatch' => $mostwatch,
                'mostWatchCounter' => $mostWatchCounter,
                'getLatestCourses' => $getLatestCourses,
                'testimonial' => $testimonial,
                'getCoursesBasedOnLibrary' => $getCoursesBasedOnLibrary,
                
                'getAllCatForGuest' => $getAllCatForGuest,
                'getLatestCoursesForGuest' => $getLatestCoursesForGuest,
                'mostwatchForGuest' => $mostwatchForGuest,

            ]);

       
    }



}
