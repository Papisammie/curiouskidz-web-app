<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Course;
use App\Models\Contact;
use App\Models\VideoCounter;
use App\Models\Newsletter;
use DB;
use Auth;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Google_Client;
use Google_Service_YouTube;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome(Request $request)
    {
        $getLatestCourses = Course::where('status', true)->paginate(5);
        $getAllCat = Category::get();
        $courses = VideoCounter::latest()->limit(15)->get();
        $getwatchLater = DB::select("SELECT * FROM courses INNER JOIN watch_later  WHERE courses.id = watch_later.course_id");
        $mess = Testimonial::get();
        // if ($request->ajax()) {
        //     $html = '';
        //     foreach ($getLatestCourses as $row) {
        //         $html.='<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-4"><div class="card w-100 p-0 shadow-xss border-0 rounded-lg overflow-hidden mr-1"><div class="card-image w-100 mb-3"><a href="/course/details/"'.$row->course_id.' class="video-bttn position-relative d-block"><img src="/uploads/course/"'.$row->image.' alt="image" class="w-100"></a></div><div class="card-body pt-0"><span class="font-xsssss fw-700 pl-3 pr-3 lh-32 text-uppercase rounded-lg ls-2 alert-warning d-inline-block text-warning mr-1">'.$row->cat_id.'</span><span class="font-xss fw-700 pl-3 pr-3 ls-2 lh-32 d-inline-block text-success float-right"><span class="font-xsssss"></span>Free</span><h4 class="fw-700 font-xss mt-3 lh-28 mt-0"><a href="/course/details/"'.$row->course_id.' class="text-dark text-grey-900">'.$row->title.'</a></h4></div></div></div>';
        //     }

        //     return $html;
        // }



        return view('welcome',[
            'getAllCat' => $getAllCat,
            'courses' => $courses,
            'getwatchLater' => $getwatchLater,
            'mess' => $mess, 
            'getLatestCourses' => $getLatestCourses, 
        ]);

    }

   




    public function courseDetails(Request $request, $course_id)
    {
        $getcourse = Course::where('course_id', $course_id)->where('status', true)->first();

        $videoClickCounter = VideoCounter::create([
            'course_id' => $course_id,
            'user_name' => Auth::user()->name,
        ]);
                    
        return view('coursedetails',[
            'getcourse' => $getcourse
        ]);
    }

    public function contact()
    {
        return view('contact');
    }

    
    public function contactPost(Request $request)
    {

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
                    
        return redirect('/')->with('success_contact', 'Contact sent, our support will get back within 48hrs');
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

            return redirect('/')->with('success_contact', 'Hurray!!!, Your Suscription to our Newsletter is activated');

        }else{

            return redirect('/')->with('error', 'Oops!!!, You subscribed already using this email');
        }
                    
        
    }


    public function about()
    {
        return view('about');
    }

    public function faq()
    {
        return view('faq');
    }

    public function ourResearch()
    {
        return view('ourResearch');
    }





    public function testing()
    {

        // $data = file_get_contents("https://www.youtube.com/oembed?format=json&url=https://youtu.be/EzyoD19q1YQ");
        // $youtubeVals = json_decode($data);

        // $urlTitle = $youtubeVals->description;
              
        // $description = $youtubeVals[0]['description'];
        // foreach($data as $datas){
        //     foreach($datas['placeditems'] as $item){
        //        $item['author_name'];
        //     }
        // }
        // return $youtubeVals;


        $headers = array(
            'Content-Type' => 'application/json',
        );
        $client = new \GuzzleHttp\Client(); 
        //Define array of request body.
        $request_body = array(
                'client_id' => "2715063f-1ebb-46fc-98a2-95426358b3b9",
                'client_secret' => "dd8d6a00-8b30-488a-ac20-eaee42ff0710",
                'grant_type' => "client_credentials"
            );

        try {
            $response = $client->request('POST','https://openapiuat.airtel.africa/auth/oauth2/token', array(
                'headers' => $headers,
                'json' => $request_body,
            )
            );
  
           $data = json_decode($response->getBody());
           return $data->access_token;
        }
        catch (GuzzleHttpExceptionBadResponseException $e) {
            // handle exception or api errors.
            print_r($e->getMessage());
        }
        




        // $msisdn = "0022796556984";
        // $trans_id = Str::random(40);
        // $headers = array(
        //     'Content-Type' => 'application/json',
        //     'X-Country' => 'NE',
        //     'X-Currency' => 'XOF',
        //     'Authorization'  =>  'Bearer D50HxErh8Y2Z0pVGi8EcB7YgUuyKronr',
        // );
        // $client = new \GuzzleHttp\Client(); 
        // // Define array of request body.
        // $request_body = array(

        //     'reference' => "Testing transaction",
        //     "subscriber" => [
        //         'country' => "NE",
        //         'currency' => "XOF",
        //         'msisdn' => $msisdn
        //     ],
        //     'transaction' => [
        //         'amount' => 50000,
        //         'country' => "NE",
        //         'currency' => "XOF",
        //         'id' => $trans_id,
        //     ]

        // );
        // try {
        //     $response = $client->request('POST','https://openapiuat.airtel.africa/merchant/v1/payments/', array(
        //         'headers' => $headers,
        //         'json' => $request_body,
        //        )
        //     );
        //     print_r($response->getBody()->getContents());
        //  }
        //  catch (GuzzleHttpExceptionBadResponseException $e) {
        //     // handle exception or api errors.
        //     print_r($e->getMessage());
        //  }
    }




    // public function showDetails(Request $request)
    // {
    //     $client = new Google_Client();
    //     $client->setDeveloperKey('AIzaSyBw5x3UXM98YUi-iIDCRsAF8f-shuLUY_k');
    //     $youtube = new Google_Service_YouTube($client);

    //     try {
    //         $videoResponse = $youtube->videos->listVideos('snippet', array(
    //             'id' => $request->videoId
    //         ));

    //         $video = $videoResponse[0];
    //         $title = $video['snippet']['title'];
    //         $description = $video['snippet']['description'];
    //         $thumbnail = $video['snippet']['thumbnails']['default']['url'];

    //         return $author;

    //         //return view('your-view', compact('title', 'description', 'thumbnail'));
    //     } catch (Google_Service_Exception $e) {
    //         return $e->getMessage();
    //     } catch (Google_Exception $e) {
    //         return $e->getMessage();
    //     }
    // }

    
}