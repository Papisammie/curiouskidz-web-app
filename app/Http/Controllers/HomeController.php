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
use Illuminate\Support\Str;

class HomeController extends Controller
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

     public function welcome()
    {
         
            $getAllCat = Category::where('libraryGroup', 'academic')->get();
            $getwatchLater = DB::select("SELECT * FROM courses INNER JOIN watch_later  WHERE courses.id = watch_later.course_id");
            $notifier = Notification::where('user_id', Auth::user()->id)->get();
            $mostwatch = VideoCounter::where('class', Auth::user()->classGroup)
                                    ->where('libraryGroup', "academic")
                                    ->latest()
                                    ->limit(15)
                                    ->get();
            
            $mostWatchCounter = $mostwatch->count();
            $getLatestCourses = Course::where('status', true)
                                        ->where('class', Auth::user()->classGroup)
                                        ->where('libraryGroup', "academic")
                                        ->where('status', True)
                                        ->latest()
                                        ->get();
                                        
                                        
                                        
            $testimonial = Testimonial::get();
            $cat = Category::get();
            
       
            return view('welcomeFirstimer',[
                'getAllCat' => $getAllCat,
                'getwatchLater' => $getwatchLater,
                'notifier' => $notifier,
                'mostwatch' => $mostwatch,
                'mostWatchCounter' => $mostWatchCounter,
                'getLatestCourses' => $getLatestCourses,
                'testimonial' => $testimonial,
                'cat' => $cat,
            ]);
        
    }

    
    public function index()
    {
        
        if (auth()->user()->roles == "admin") {
            
            return redirect('/admin/home');
            
         }
         
         
        if ((auth()->user()->roles == NULL || auth()->user()->password == NULL)) {
            
            $id = auth()->user()->id;
            return redirect('/googleProfileChangeRole/' .$id)->with('success', 'Assign your Account Type to enjoy the platform');
            
         }else{
             
                //For Guest Only
                $getAllCatForGuest = Category::get();
                $getLatestCoursesForGuest = Course::where('status', true)->where('libraryGroup', "academic")->latest()->get();
                $mostwatchForGuest = VideoCounter::where('libraryGroup', "academic")                         ->latest()
                                        ->limit(15)
                                        ->get();
                
                
                
                
                
                
             
                $getAllCat = Category::where('libraryGroup', 'academic')->get();
                $getwatchLater = DB::select("SELECT * FROM courses INNER JOIN watch_later  WHERE courses.id = watch_later.course_id");
                $notifier = Notification::where('user_id', Auth::user()->id)->get();
                $mostwatch = VideoCounter::where('class', Auth::user()->classGroup)->where('libraryGroup', "academic")                         ->latest()
                                        ->limit(15)
                                        ->get();
                                        
                $mostWatchCounter = $mostwatch->count();
                $getLatestCourses = Course::where('status', true)->where('class', Auth::user()->classGroup)
                                            ->where('libraryGroup', "academic")
                                            ->latest()->get();
                $testimonial = Testimonial::get();
                
           
                return view('home',[
                    'getAllCat' => $getAllCat,
                    'getwatchLater' => $getwatchLater,
                    'notifier' => $notifier,
                    'mostwatch' => $mostwatch,
                    'mostWatchCounter' => $mostWatchCounter,
                    'getLatestCourses' => $getLatestCourses,
                    'testimonial' => $testimonial,
                    
                    'getAllCatForGuest' => $getAllCatForGuest,
                    'getLatestCoursesForGuest' => $getLatestCoursesForGuest,
                    'mostwatchForGuest' => $mostwatchForGuest,
                ]);
         }
    }



    public function getprofile($id)
    {
        
         if (auth()->user()->roles == "admin") {
            
            return redirect('/admin/home');
            
         }

         
         
        $getUser = User::where('id', $id)->first();
        $notifier = Notification::where('user_id', Auth::user()->id)->get();
        return view('profile.index',[
            'getUser' => $getUser,
            'notifier' => $notifier,

        ]);
    }



    public function courseDetails(Request $request, $course_id)
    {
        
         if (auth()->user()->roles == "admin") {
            
            return redirect('/admin/home');
            
         }
         
        $getcourse = Course::where('course_id', $course_id)->where('status', true)->first();
        $getcourseAndCount = VideoCounter::where('course_id', $course_id)->first();
        $notifier = Notification::where('user_id', Auth::user()->id)->get();
        $watch = WatchLater::where('course_id', $course_id)->where('user_id', Auth::user()->id)->first();
        $related = Course::where('id', '=', $getcourse->id)
        ->where('status', true)
        ->get();
        $cat = Category::all();

        
        $getUserChat = ChatReply::where('course_id', $course_id)->get();
        $getUserChatMySelf = ChatReply::where('course_id', $course_id)->where('user_id', Auth::user()->id)->get();

        if($getcourseAndCount){
                VideoCounter::where('course_id', $course_id)->update([
                    'counter' => $getcourseAndCount->counter + 1,
                ]);

                return view('coursedetails',[
                    'getcourse' => $getcourse,
                    'getcourseAndCount' => $getcourseAndCount,
                    'watch' => $watch,
                    'notifier' => $notifier,
                    'cat' => $cat,
                    'related' => $related,
                    'getUserChat' => $getUserChat,
                    'getUserChatMySelf' => $getUserChatMySelf,
                ]);
           
        }

        if(is_null($getcourseAndCount)){

            $getcourse = Course::where('course_id', $course_id)->where('status', true)->first();
            VideoCounter::create([
                'course_id' => $course_id,
                'user_name' => Auth::user()->name,
                'course_title' => $getcourse->title,
                'course_images' => $getcourse->image,
                'course_cat' => $getcourse->cat_id,
                'ageGroup' => $getcourse->ageGroup,
                'class' => $getcourse->class,
                'libraryGroup' => $getcourse->libraryGroup,
                'counter' => 1,
            ]);


            return view('coursedetails',[
                'getcourseAndCount' => $getcourseAndCount,
                'watch' => $watch,
                'getcourse' => $getcourse,
                'cat' => $cat,
                'notifier' => $notifier,
                'related' => $related,
                'getUserChat' => $getUserChat,
                'getUserChatMySelf' => $getUserChatMySelf,
            ]);

        }


    }






    public function reply(Request $request, $course_id)
    {
               $check = ChatReply::create([
                    'course_id' => $course_id,
                    'user_id' => Auth::user()->name,
                    'message' => $request->message,
                    // 'date' => $mytime->toDateTimeString(),

                ]);

                return back()->with('success','Reply Sent');
            
    }


    public function watchLater($course_id)
    {
         if (auth()->user()->roles == "admin") {
            
            return redirect('/admin/home');
            
         }
         
        $getcourse = Course::where('course_id', $course_id)->where('status', true)->first();

        if($getcourse){

            WatchLater::create([
                'course_id' => $getcourse->course_id,
                'user_id' => Auth::user()->id,
                'image' => $getcourse->image
            ]);

            Notification::create([
                'course_id' => $getcourse->course_id,
                'image' => $getcourse->image,
                'user_id' => Auth::user()->id,
                'title' => "Course Saved",
                'message' => "You just saved to watch a course later"
            ]);

            return back()->with('success_watch','Watch Later Saved!');

            
        }else{

            return back()->with('success_watch','Watch Later Already Saved!');
        }
    }



    public function getWatchLaterPerUserID($user_id)
    {
        $getwatchlater = WatchLater::where('user_id', Auth::user()->id)->get();
        $notifier = Notification::where('user_id', Auth::user()->id)->get();
        return view('watchLater',[
            'getwatchlater' => $getwatchlater,
            'notifier' => $notifier
        ]);
    }


    
    public function mybadge($name)
    {
        
         if (auth()->user()->roles == "admin") {
            
            return redirect('/admin/home');
            
         }


        
        
        $getUserGamification = UsersOnGamified::where('user_id', $name)->where('click', true)->get();
        
        // if($badges == Null){
            
        //      return redirect()->back();
            
        // }
        // $getUserGamification = Badges::where('image', $badges->badge_to_be_won)->get();

       

        $notifier = Notification::where('user_id', Auth::user()->id)->get();
        return view('mybadge',[
            'getUserGamification' => $getUserGamification,
            // 'badges' => $badges,
            'notifier' => $notifier,
        ]);
    }






    public function updateStudentProfile(Request $request,$id)
    {

        if (auth()->user()->roles == "admin") {
            
            return redirect('/admin/home');
            
         }

        
            $image=$request->file('avatar');
            if($image){
                $imageName = time(). $image->getClientOriginalName();
                $image->move('uploads/profilePicture',$imageName);
                $imagePath = "uploads/profilePicture/$imageName";

                $getUser = User::where('id', $id)->first();
                User::where('id', $getUser->id)->update([
                    'avatar' => $imageName,
                    'class' => $request->class,
                    'classGroup' => $request->classGroup,
                    'nameOfSchool' => $request->nameOfSchool,
                ]);
    
                return back()->with('success','Profile Updated Successfully!');
            }else{


                $getUser = User::where('id', $id)->first();
                User::where('id', $getUser->id)->update([
                    'class' => $request->class,
                    'classGroup' => $request->classGroup,
                    'nameOfSchool' => $request->nameOfSchool,
                ]);
    
                return back()->with('success','Profile Updated Successfully!');

            }
          
            return back()->with('error','Error Updating!');
    }


    public function updateParentProfile(Request $request,$id)
    {
        
         if (auth()->user()->roles == "admin") {
            
            return redirect('/admin/home');
            
         }


        $image = $request->file('parentImage');
        if($image){
            $imageName = time(). $image->getClientOriginalName();
            $image->move('uploads/profilePicture/',$imageName);
            $imagePath = "uploads/profilePicture/$imageName";

            $getUser = User::where('id', $id)->first();
            User::where('id', $getUser->id)->update([
                'parentImage' => $imageName,
                'parentName' => $request->parentName,
                'email' => $request->email,
                'parentNumber' => $request->parentNumber,
                'class' => $request->class,
                'name' => $request->name,
                'how_many_kids' => $request->how_many_kids,
                'classGroup' => $request->classGroup,
                'nameOfSchool' => $request->nameOfSchool,
            ]);

        }else{

            $getUser = User::where('id', $id)->first();
            User::where('id', $getUser->id)->update([
                'parentName' => $request->parentName,
                'email' => $request->email,
                'parentNumber' => $request->parentNumber,
                'class' => $request->class,
                'name' => $request->name,
                'how_many_kids' => $request->how_many_kids,
                'classGroup' => $request->classGroup,
                'nameOfSchool' => $request->nameOfSchool,
            ]);


        }
        return back()->with('success','Profile Updated Successfully!');

    }



    public function category($title)
    {
        $notifier = Notification::where('user_id', Auth::user()->id)->get();
        $getCat = Category::where('title', $title)->first();
        $getCourse = Course::where('cat_id', $title)->where('status', true)
                            ->where('libraryGroup', "academic")
                            ->paginate(20);
        return view('viewCoursesInCategory',[
            'getCat' => $getCat,
            'getCourse' => $getCourse,
            'notifier' => $notifier
        ]);
    }


    public function categoryEdu($title)
    {
        $notifier = Notification::where('user_id', Auth::user()->id)->get();
        $getCat = Category::where('title', $title)->first();
        $getCourse = Course::where('cat_id', $title)->where('status', true)
                            ->where('libraryGroup', "educational")
                            ->paginate(20);

        return view('viewCoursesInCategory',[
            'getCat' => $getCat,
            'getCourse' => $getCourse,
            'notifier' => $notifier
        ]);
    }
    


    public function getCerified(Request $request,$ageGroup)
    {
        
        if (auth()->user()->roles == "admin") {
            
            return redirect('/admin/home');
            
        }


            $notifier = Notification::where('user_id', Auth::user()->id)->get();
            $checkAgeGroup = User::where('class', $ageGroup)->first();

            $gamify = Gamify::where('ageGroup', $ageGroup)->where('status', "Publish")->first();
            $cat = Category::where('title', $gamify->course_cat)->get();
            
            //GET VIDEO COURSES BELONG TO EACH CATEGORY
            $catFirst = Category::where('age', $ageGroup)->first();
            $getGamify = Gamify::where('course_cat', $catFirst->title)->where('ageGroup', $ageGroup)->where('status', "Publish")->get();


            //GET VIDEO COURSE COUNT
            $getVideos = UsersOnGamified::where('user_id', Auth::user()->name)->where('ageGroup', $ageGroup)->get();
            $countGamify = $getVideos->count();

            //ASSIGN WON TICK TO USER WHO WON EACH COURSES 
            $getWonCheck = UsersOnGamified::where('ageGroup', $ageGroup)->where('user_id', Auth::user()->name)->where('click', true)->first();
            
            
            $badge = Badges::where('ageGroup', $ageGroup)->first();


            $check = UsersOnGamified::where('ageGroup', $ageGroup)->where('user_id', Auth::user()->id)->get();

                    if($check){

                        foreach($getGamify as $item){
                    
                            UsersOnGamified::updateOrCreate([
                                'gamify_id' => $item->gamify_id,
                                'user_id' => Auth::user()->name,
                                'ageGroup' => $ageGroup,
                                'status' => "pending",
                                'course_title' => $item->course_title,
                                'course_cat' => $item->course_cat,
                                'course_id' => $item->course_id,
                                'clickToView' => true,
                                'course_image' => $item->course_image,
                                'badge_to_be_won' => $badge->badge_to_be_won,
                                'howManyCourse' => $item->howManyCourse,
                            ]);
                        }
                        


                        return view('getCerified',[
                            'getGamify' => $getGamify,
                            'countGamify' => $countGamify,
                            'catFirst' => $catFirst,
                            'cat' => $cat,
                            'checkAgeGroup' => $checkAgeGroup,
                            'notifier' => $notifier,
                            'gamify' => $gamify,
                            'getWonCheck' => $getWonCheck,
                            'getVideos' => $getVideos,
            
                        ]);

                    }else{

                        
                        return view('getCerified',[
                            'getGamify' => $getGamify,
                            'countGamify' => $countGamify,
                            'catFirst' => $catFirst,
                            'cat' => $cat,
                            'checkAgeGroup' => $checkAgeGroup,
                            'notifier' => $notifier,
                            'gamify' => $gamify,
                            'getWonCheck' => $getWonCheck,
                            'getVideos' => $getVideos,
            
                        ]);

                    }
        

    }




    public function getCertifyNotFound()
    {
        if (is_null(auth()->user()->class)) {
            
            return redirect('/profile/'. Auth::user()->id)->with('error','Please Update your profile before you can get Gamified to win Awards and Bagdes');
            
        }

    }



    public function getAllCoursesInCategory(Request $request, $ageGroup)
    {
        $gamify = UsersOnGamified::where('ageGroup', $ageGroup)->where('user_id', Auth::user()->name)->where('clickToView', true)->get();
        $notifier = Notification::where('user_id', Auth::user()->id)->get();

        $getBadge = UsersOnGamified::where('ageGroup', $ageGroup)->where('user_id', Auth::user()->name)->where('clickToView', true)->first();

    
        return view('getCertifiedAllCourses',[
                'gamify' => $gamify,
                'notifier' => $notifier,
                'getBadge' => $getBadge,
        ]);
    }



    public function getCertifiedDetails(Request $request, $gamify_id)
    {
        $getcourse = Gamify::where('gamify_id', $gamify_id)->where('status', "Publish")->first();
        $notifier = Notification::where('user_id', Auth::user()->id)->get();
          
            return view('getCertifiedDetails',[
                'getcourse' => $getcourse,
                'notifier' => $notifier,
            ]);
    }


    public function germifiedUser(Request $request, $gamify_id)
    {
            $getcourse = Gamify::where('gamify_id', $gamify_id)->first();
            $check = UsersOnGamified::where('gamify_id', $gamify_id)->update([
                'click' => true,
            ]);


          
            return redirect('/germified/allCourses/'. $getcourse->ageGroup)->with('success', 'Course Completed');
   
    }


    





    public function newsletter(Request $request)
    {
        $request->validate([
            'email' => 'string|email|max:255|unique:users',
        ]);
       
       $newsletter = Newsletter::create([
            'email' => $request->email,
            'agree' => true,
        ]);

        if($newsletter){

            return redirect('/home')->with('success_contact', 'Hurray!!!, Your Suscription to our Newsletter is activated');

        }else{

            return redirect('/home')->with('error', 'Oops!!!, You subscribed already using this email');
        }
                    
        
    }
    


    public function googleProfileChangeRole($id)
    {
        
        $users = User::where('id', $id)->first();
        $notifier = Notification::where('user_id', Auth::user()->id)->get();
        return view('profile.googleProfileChangeRole',[
            'users' => $users,
            'notifier' => $notifier,
        ]);
    }


    public function googleProfileChangeRolePost(Request $request,$id)
    {
            User::where('id', $id)->update([
                'roles' => $request->roles,
                'password' => Hash::make($request['password']),
                'classGroup' => $request->classGroup,
                'class' => $request->class,
                                                   
            ]);

        return redirect('/home')->with('success','Account Type Updated Successfully!');

    }
    

}
