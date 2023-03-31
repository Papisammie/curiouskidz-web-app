<?php
    
namespace App\Imports;
    
use App\Models\Course;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Google_Client;
use Google_Service_YouTube;

class EdutainmentImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    { 

        $client = new Google_Client();
        $client->setDeveloperKey(env('YOUTUBE_API'));
        $youtube = new Google_Service_YouTube($client);

        try {
            
            $videoResponse = $youtube->videos->listVideos('snippet', array(
                'id' =>  $row['videoID'],
            ));

            $video = $videoResponse[0];
            $title = $video['snippet']['title'];
            $description = $video['snippet']['description'];
            $thumbnail = $video['snippet']['thumbnails']['default']['url'];

            return new Course([
                'title'     => $title,
                'description'    => $description,
                'image'     => $thumbnail,
                'video_url'    => $request->videoId,
                'libraryGroup'     => "edutainment",
                'status'    => true,
            ]);

   
            } catch (Google_Service_Exception $e) {
                return $e->getMessage();
            } catch (Google_Exception $e) {
                return $e->getMessage();
            }

            


    }
}