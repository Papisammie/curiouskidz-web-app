<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
use App\Exports\EdutainmentExport;
 
use App\Imports\EdutainmentImport;
 
use Maatwebsite\Excel\Facades\Excel;
 
use App\Models\Course;
use Google_Client;
use Google_Service_YouTube;
use Illuminate\Support\Str;
 
class ExcelCSVController extends Controller
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
    * @return \Illuminate\Support\Collection
    */
    public function bulkCourse()
    {
        return view('admin.course.bulkUpload');
    }


    public function importExcelCSVEdutainment(Request $request)
    {

          try {

            $client = new Google_Client();
            $client->setDeveloperKey('AIzaSyBw5x3UXM98YUi-iIDCRsAF8f-shuLUY_k');
            $youtube = new Google_Service_YouTube($client);

           

            // foreach ($result['items'] as $item) {
            //     $title = $item['snippet']['title'] . '<br>';
            //     $description = $item['snippet']['description'] . '<br>';
            //     $thumbnail = $item['snippet']['thumbnails']['default']['url'] . '<br>';

                // $courses = new Course();
                // $courses->video_url = array(
                //     'videoIdOne', 
                //     'videoIdTwo', 
                //     'videoIdThree',
                //     'videoIdFour',
                //     'videoIdFive',
                //     'videoIdSix',
                //     'videoIdSeven',
                //     'videoIdEight',
                //     'videoIdNine',
                //     'videoIdTen'),
                // $courses->course_id = Str::random(20),
                // $courses->title = $title;
                // $courses->description = $description;
                // $courses->image = $thumbnail;
                // $courses->libraryGroup = "edutainment";
                // $courses->status = true;
                // $courses->save();
            // }
            
            

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
                    $courses->libraryGroup = "educational";
                    $courses->status = true;
                    $courses->save();


                   return back()->with('success','All Content updated');
            

        } catch (Google_Service_Exception $e) {
            return $e->getMessage();
        } catch (Google_Exception $e) {
            return $e->getMessage();
        }


        //  $validatedData = $request->validate([
 
        //    'file' => 'required',
 
        // ]);


        // $check = Excel::import(new EdutainmentImport,$request->file('file'));

        // if($check){

        //     return back()->with('success', 'Excel/csv imported successfully');
        // }else{

        //     return back()->with('error', 'Error uploadinng');
        // }

    }



    public function importExcelCSVAcademic(Request $request)
    {

          try {
            
                    $client = new Google_Client();
                    $client->setDeveloperKey('AIzaSyBw5x3UXM98YUi-iIDCRsAF8f-shuLUY_k');
                    $youtube = new Google_Service_YouTube($client);


                    // Academic 
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
                    $courses->libraryGroup = "academic";
                    $courses->status = true;
                    $courses->save();

                    return back()->with('success','All Content updated');
            

        } catch (Google_Service_Exception $e) {
            return $e->getMessage();
        } catch (Google_Exception $e) {
            return $e->getMessage();
        }


    }


    

    /**
    * @return \Illuminate\Support\Collection
    */
    public function exportExcelCSV($slug) 
    {
        return Excel::download(new EdutainmentExport, 'AllCourseData.'.$slug);
    }
}