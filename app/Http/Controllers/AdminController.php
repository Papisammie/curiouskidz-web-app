<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Course;
use App\Models\Contact;
use App\Models\Newsletter;
use App\Models\Gamify;
use App\Models\UsersOnGamified;
use Illuminate\Support\Str;
use App\Models\Badges;
use App\Models\Testimonial;
use App\Models\AdminChooseClassGroup;
use App\Models\AdminChooseAgeGroup;
use Google_Client;
use Google_Service_YouTube;

class AdminController extends Controller
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
        $users = User::get();
        $usersCount = $users->count();
        $getStudent = User::where('roles', 'student')->get();
        $getParent = User::where('roles', 'parent')->get();
        $getCourses = Course::get();
        $getNewsletter = Newsletter::get();
        $getContact = Contact::get();
        $incomingUsers = User::orderBy('created_at', 'desc')->latest()->limit(7)->get();

        $studentCount = $getStudent->count();
        $parentCount = $getParent->count();
        $videosCount = $getCourses->count();
        $newsletterCount = $getNewsletter->count();
        $contactCount = $getContact->count();

        $Data = array
                  (
                    "0" => array
                                    (
                                      "value" => $parentCount,
                                      "name" => "Parent",
                                    ),
                    "1" => array
                                    (
                                      "value" => $studentCount,
                                      "name" => "Student",
                                    )
                                    
                    // "2" => array
                    //                 (
                    //                   "value" => 234,
                    //                   "name" => "Admin",
                    //                 )
                    //                 ,
                    // "3" => array
                    //                 (
                    //                   "value" => 135,
                    //                   "name" => "Banana",
                    //                 )
                  );


        $visitors = User::select("name")->get();
  
        $result[] = ['Dates','Number'];
        foreach ($visitors as $key => $value) {
            $result[++$key] = [$value->visit_date, (int)$value->click, (int)$value->viewer];
        }

        return view('admin.index',[
            'users' => $users,
            'getStudent' => $getStudent,
            'getParent' => $getParent,
            'usersCount' => $usersCount,
            'incomingUsers' => $incomingUsers,
            'studentCount' => $studentCount,
            'parentCount' => $parentCount,
            'Data' => $Data,
            'result' => $result,
            'getNewsletter' => $getNewsletter,
            'contactCount' => $contactCount,
            'newsletterCount' => $newsletterCount,
            'contactCount' => $contactCount,
            'videosCount' => $videosCount,
            
        ]);
    }


    public function category()
    {
        $getEdu = Category::where('libraryGroup', 'educational')->get();
        $getAdc = Category::where('libraryGroup', 'academic')->get();

        return view('admin.category.index',[
            'getEdu' => $getEdu,
            'getAdc' => $getAdc,
        ]);
    }



    public function categoryPost(Request $request)
    {

        $this->validate(request(),[
            'image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
            'description' => 'required',
            'libraryGroup' => 'required',

        ]);

        $image=$request->file('image');

        if($image){
            $imageName = time(). $image->getClientOriginalName();
            $image->move('uploads/category/',$imageName);
            $imagePath = "uploads/category/$imageName";

            $cat = Category::create([
                'image' => $imageName,
                'title' => $request->title,
                // 'age' => $request->age,
                'description' => $request->description,
                'libraryGroup' => $request->libraryGroup,
                // 'class' => $request->class,
            
            ]);
        }
        
        return back()->with('success','Category saved successfully');
    }



    public function editCategory($id)
    {
        $cat = Category::where('id', $id)->first();
        $getClassgroup = AdminChooseClassGroup::get();
        $getAgegroup = AdminChooseAgeGroup::get();

        return view('admin.category.edit',[
            'cat' => $cat,
            'getClassgroup' => $getClassgroup,
            'getAgegroup' => $getAgegroup,
        ]);
    }


    public function editCategoryPost(Request $request, $id)
    {
        $image=$request->file('image');

        if($image){
            $imageName = time(). $image->getClientOriginalName();
            $image->move('uploads/category/',$imageName);
            $imagePath = "uploads/category/$imageName";
            $cat = Category::where('id', $id)->update([
                'image' => $imageName,
                'title' => $request->title,
                'description' => $request->description,
                 'libraryGroup' => $request->libraryGroup,
                //  'class' => $request->class,
                //  'age' => $request->age,
            
            ]);
        }else{
            
            $cat = Category::where('id', $id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'libraryGroup' => $request->libraryGroup,
                // 'class' => $request->class,
                // 'age' => $request->age,
            
            ]);
            
        }
        
        return redirect('/admin/manage/category')->with('success','Category Updated successfully');
    }



    public function deleteCategory($id){
		$cat = Category::find($id);
		$cat->delete();

        return back()->with('success','Category Deleted successfully');
	}


    public function course()
    {
        $course = Course::orderBy('id', 'DESC')->get();
        $cat = Category::get();
        return view('admin.course.index',[
            'course' => $course,
            'cat' => $cat,
        ]);
    }


    public function coursePost(Request $request)
    {

        $this->validate(request(),[
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'type' => 'required',
            'video_url' => 'required',
            'requirements' => 'required',
            'cat_id' => 'required',
            'libraryGroup' => 'required',
        ]);

        try {
            
                    $client = new Google_Client();
                    $client->setDeveloperKey('AIzaSyBw5x3UXM98YUi-iIDCRsAF8f-shuLUY_k');
                    $youtube = new Google_Service_YouTube($client);


                    // Edutainment 

                    $videoResponse = $youtube->videos->listVideos('snippet', array(
                        'id' => $request->videoId
                    ));
                            

                    $video = $videoResponse[0];
                    $title = $video['snippet']['title'];
                    $description = $video['snippet']['description'];
                    $thumbnail = $video['snippet']['thumbnails']['default']['url'];


                    $courses = new Course();
                    $courses->video_url = $request->videoId;
                    $courses->course_id = Str::random(20);
                    $courses->title = $title;
                    $courses->description = $description;
                    $courses->image = $thumbnail;
                    $courses->libraryGroup = $request->libraryGroup;
                    $courses->status = true;
                    $courses->type = $request->type;
                    $courses->author = $request->author;
                    $courses->requirements = $request->requirements;
                    $courses->ageGroup = $request->ageGroup;
                    $courses->class = $request->class;
                    $courses->cat_id = $request->cat_id;
                    $courses->save();
        
            return back()->with('success','Course saved successfully');
        } catch (Google_Service_Exception $e) {
            return $e->getMessage();
        } catch (Google_Exception $e) {
            return $e->getMessage();
        }

    }



    public function editCourse($course_id)
    {
        $course = Course::where('course_id', $course_id)->first();
        $cat = Category::get();

        return view('admin.course.edit',[
            'course' => $course,
            'cat' => $cat,
        ]);
    }



    public function editCoursePost(Request $request, $course_id)
    {
        try {
            
            $client = new Google_Client();
            $client->setDeveloperKey('AIzaSyBw5x3UXM98YUi-iIDCRsAF8f-shuLUY_k');
            $youtube = new Google_Service_YouTube($client);


            // Edutainment 

            $videoResponse = $youtube->videos->listVideos('snippet', array(
                'id' => $request->videoId
            ));
                    

            $video = $videoResponse[0];
            $title = $video['snippet']['title'];
            $description = $video['snippet']['description'];
            $thumbnail = $video['snippet']['thumbnails']['default']['url'];

            $cat = Course::where('course_id', $course_id)->update([
                'title' => $title,
                'type' => $request->type,
                'author' => $request->author,
                'description' => $description,
                'image' => $thumbnail,
                'video_url' => $request->videoId,
                'requirements' => $request->requirements,
                'cat_id' => $request->cat_id,
                'ageGroup' => $request->ageGroup,
                'libraryGroup' => $request->libraryGroup,
                'class' => $request->class,
            ]);

        
                return redirect('/admin/manage/course')->with('success','Course Edit Saved successfully');
        } catch (Google_Service_Exception $e) {
            return $e->getMessage();
        } catch (Google_Exception $e) {
            return $e->getMessage();
        }
    }

    
    public function deleteCourse($id){
		$course = Course::find($id);
		$course->delete();

        return back()->with('success','Course Deleted successfully');
	}


    public function getAllUsers()
    {
        $users = User::get();

        return view('admin.users.index',[
            'users' => $users,
        ]);
    }


    public function viewUser($id)
    {
        $getUser = User::where('id', $id)->first();
        return view('admin.users.view',[
            'getUser' => $getUser,
        ]);
    }


    public function activateUser(Request $request, $id){
		User::where('id', $id)->update([
            'status' => true
        ]);

        return back()->with('success','User Activated successfully');
	}


    public function deactivateUser(Request $request, $id){

		User::where('id', $id)->update([
            'status' => false
        ]);

        return back()->with('success','User Deactivated successfully');
	}


    // public function deleteUser($id){
	// 	$user = User::find($id);
	// 	$user->delete();

    //     return back()->with('success','User Deleted successfully');
	// }





    public function getNewsletter()
    {
        $newsletter = Newsletter::get();

        return view('admin.newsletter',[
            'newsletter' => $newsletter,
        ]);
    }



    public function gamifications()
    {
        $getCourse = Course::get();
        $getGamy= Gamify::get();
        $cat = Category::get();
        $badges = Badges::get();
        return view('admin.gamifications',[
            'getCourse' => $getCourse,
            'getGamy' => $getGamy,
            'cat' => $cat,
            'badges' => $badges,
        ]);
    }


    public function gamificationsPost(Request $request)
    {
            $getCourse = Course::where('title', $request->course_title)->first();
            $gamy = Gamify::create([
                'course_title' => $getCourse->title,
                'course_image' => $getCourse->image,
                'course_cat' => $getCourse->cat_id,
                'course_id' => $getCourse->id,
                'ageGroup' => $request->ageGroup,
                'status' => $request->status,
                'howManyCourse' => $request->howManyCourse,
                'badge_to_be_won' => $request->badge_to_be_won,
                'gamify_id' => Str::random(20),
            ]);

            if($gamy){

                return back()->with('success','Gamification Pusblised successfully');
            }else{

                return back()->with('success','Gamification Pusblised successfully');
            }
        
        
    }
    


    public function deleteGamification($id){
		$gamy = Gamify::find($id);
		$gamy->delete();

        return back()->with('success','Gamification Deleted successfully');
	}


    public function publishGamification(Request $request, $id){
		$gamy = Gamify::where('id', $id)->update([
            'status' => "Publish"
        ]);

        return back()->with('success','Gamification Publish successfully');
	}


    public function unpublishGamification(Request $request, $id){

		Gamify::where('id', $id)->update([
            'status' => "Unpublish"
        ]);

        return back()->with('success','Gamification Unpublish successfully');
	}
    
    

    public function addBadges()
    {
        $getBadges = Badges::get();
        return view('admin.addBadges',[
            'getBadges' => $getBadges,
        ]);
    }


    public function addBadgesPost(Request $request)
    {
        $image=$request->file('image');

        if($image){
            $imageName = time(). $image->getClientOriginalName();
            $image->move('uploads/badges/',$imageName);
            $imagePath = "uploads/badges/$imageName";
            $badges = Badges::create([
                'image' => $imageName,
                'title' => $request->title,
                'ageGroup' => $request->ageGroup,
                'status' => $request->status,
                'description' => $request->description,
            
            ]);
        }
        
        return back()->with('success','Badge Saved successfully');
    }

    public function deleteBadge($id){
		$badges = Badges::find($id);
		$badges->delete();

        return back()->with('success','Badge Deleted successfully');
	}



    public function publishCourse(Request $request, $id){
		$course = Course::where('id', $id)->update([
            'status' => true
        ]);

        return back()->with('success','Course Publish successfully');
	}


    public function unpublishCourse(Request $request, $id){

		$course = Course::where('id', $id)->update([
            'status' => false
        ]);

        return back()->with('success','Course Unpublish successfully');
	}







    public function addtestimonial()
    {
        $testimonial = Testimonial::get();
        return view('admin.testimonial.addtestimonial',[
            'testimonial' => $testimonial,
        ]);
    }


    public function testimonialPost(Request $request)
    {
        $image=$request->file('image');

        if($image){
            $imageName = time(). $image->getClientOriginalName();
            $image->move('uploads/testimonial/',$imageName);
            $imagePath = "uploads/testimonial/$imageName";
            $testimonial = Testimonial::create([
                'image' => $imageName,
                'title' => $request->title,
                'description' => $request->description,
            
            ]);
        }
        
        return back()->with('success','Testimonial Saved successfully');
    }

    public function deletetestimonial($id){
		$testimonial = Testimonial::find($id);
		$testimonial->delete();

        return back()->with('success','Testimonial Deleted successfully');
	}




    public function editTestimonial($id)
    {
        $test = Testimonial::where('id', $id)->first();

        return view('admin.testimonial.edit',[
            'test' => $test,
        ]);
    }



    public function editTestimonialPost(Request $request, $id)
    {
        $image=$request->file('image');

        if($image){
            $imageName = time(). $image->getClientOriginalName();
            $image->move('uploads/testimonial/',$imageName);
            $imagePath = "uploads/testimonial/$imageName";
            $test = Testimonial::where('id', $id)->update([
                'image' => $imageName,
                'title' => $request->title,
                'description' => $request->description,
            
            ]);
        }else{

            $test = Testimonial::where('id', $id)->update([
                'title' => $request->title,
                'description' => $request->description,
            
            ]);


        }
        
        return redirect('/admin/testimonial')->with('success','Testimonial Updated successfully');
    }



    public function courseSearch (Request $request){

        if($request->q){

            $q = $request->q;
            $course = Course::where('title','LIKE','%'.$q.'%')
                            ->get();

            if(count($course) > 0){
                return view('admin/course/search', [
                    'course' => $course,
    
                ])->with('success', "Getcha, Search Found");;
            }else{
                return redirecct('admin/manage/course')->with('error','No Course Search found. Try to search again !');
            }
        }
       
    }



    public function getAllGamifiedUsers()
    {

         $cat = UsersOnGamified::get();

        return view('admin.gamification.index',[
            'cat' => $cat,

        ]);
    }


    public function getContacts()
    {

        $getContact = Contact::get();
        

        return view('admin.contact',[
            'getContact' => $getContact,
        ]);
    }
    
    


    // METHOD TO UPLOAD THE YOUTUBE WITH THUMBNAIL


    // if(!function_exists('get_youtube_thumbnail')) {
    //     function get_youtube_thumbnail($youtube_video_link) {
    //         $video_thumbnail = '';
    //         $video_id = '';
    //         if(!empty($youtube_video_link)){
    
    //             $first_explode_link = explode("?v=", $youtube_video_link);
    
    //             if(!empty($first_explode_link[1])){
    //                 $video_id = $first_explode_link[1];
    //             }else{
    //                 $second_explode_link = explode(".be/", $youtube_video_link);
    
    //                 if(!empty($second_explode_link[1])){
    //                     $video_id = $second_explode_link[1];
    //                 }
    //             }
    
    //             if(!empty($video_id)){
    //                 $video_thumbnail = "http://img.youtube.com/vi/" . $video_id . "/hqdefault.jpg";
    //             }
    //         }
    //         return $video_thumbnail;
    //     }
    // }



   

}
