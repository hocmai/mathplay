<?php
namespace App\Http\Controllers;
class TestController extends \BaseController {

    public function getUpdateChapterTable(){
        $chapters = Chapter::whereNull('grade_id')->whereNotNull('subject_id')->get();
        foreach ($chapters as $chapter) {
            $subject = $chapter->subject;
            if($subject){
                $gradeId = Common::getObject($subject->grade, 'id');
                $chapter->update(['grade_id' => $gradeId]);
            }
        }
    }

    public function getUpdateLessonTable(){
        $lessons = Lession::whereNull('grade_id')->whereNull('subject_id')->whereNotNull('chapter_id')->get();
        foreach ($lessons as $lesson) {
            $chapter = $lesson->chapter;
            if($chapter){
                $gradeId = $chapter->grade_id;
                $subjectId = $chapter->subject_id;
                $lesson->update(['grade_id' => $gradeId, 'subject_id' => $subjectId]);  
            }
        }
    }

}
