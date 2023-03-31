<?php
   
namespace App\Exports;
   
use App\Models\Course;
 
use Maatwebsite\Excel\Concerns\FromCollection;
   
class CoursesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Course::select('title',
                            'description',
                            'author',
                            'video_url',
                            'requirements',
                            'type',
                            'class',
                            'ageGroup',
                            'libraryGroup',
                            'cat_id')->get();
    }
}