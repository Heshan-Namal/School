<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Student;
use App\Models\Grade;
use App\Models\Classroom;
use App\Models\Attentiveness_check;
use App\Models\Assesment;
use App\Models\Attentiveness_check_Question;
use App\Models\Subject;
use App\Models\Student_assesment;
use App\Models\Student_Attentiveness_check;
use App\Models\Assessment_quiz_question;
use App\Models\Resource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Validator;
use Carbon\Carbon;

class StudentController extends Controller
{

    public function addstudent(Request $req)
    {
        $req->validate([
            'id' => 'required',
            'admission_no' =>'required',
            'full_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'admin_id' => 'required',
            'grade_id' => 'required',
            'class_id' => 'required'
        ]);

        $student = new student();
        $student->id = $req->id;
        $student->full_name = $req->full_name;
        $student->admissio_no = $req->admissio_no;
        $student->email = $req->email;
        $student->password = $req->password;
        $student->admin_id = $req->admin_id;
        $student->grade_id = $req->grade_id;
        $student->class_id = $req->class_id;
        $student->save();
        return $student;
    }
    public function updatestudent(Request $req, $student_id)
    {

        $req->validate([
            'id' => 'required',
            'name' => 'required'

        ]);
        $student = Student::find($student_id);
        $student->id = $req->get('id');
        $student->name = $req->get('name');
        $student->email = $req->get('email');
        $student->password = $req->get('password');
        $student->admin_id = $req->get('admin_id');
        $student->grade_id = $req->get('grade_id');
        $student->class_id = $req->get('class_id');

        $student->save();
        return $student;
    }
    public function destroy_a_student($student_id)
    {
        $student = Student::find($student_id);
        return $student->delete();
    }
    // using admin id
    public function getadmin_createstudents($student_id)
    {
        return Admin::find($student_id)->getstudents;
    }
    public function getgradestudents($student_id)
    {
        return Grade::find($student_id)->getstudents;
    }
    public function getclassstudents($student_id)
    {
        return Classroom::find($student_id)->getstudents;
    }

    public function getSubjectsList($admission_no)
    {
        $data = DB::table('Student')
            ->where('Student.admission_no', '=', $admission_no)
            ->join('Class', 'Class.id', '=', 'Student.class_id')
            ->join('Subject_class', 'Subject_class.class_id', '=', 'Class.id')
            ->join('Subject', 'Subject.id', '=', 'Subject_class.subject_id')
            ->select('Subject.subject_name as subject', 'Subject.id as subject_id', 'Class.class_name as class', 'Class.id as class_id')
            ->orderBy('subject_id', 'desc')
            ->get();
        return view('Student.student_subject.mysubjects', compact('data'));
        //dd($data);
    }

    public function getSubjectWeekList($class_id, $subject_id)
    {
        $subject=DB::table('subject')
                        ->where('subject.id', '=', $subject_id)
                        ->get();
        return view('Student.student_subject.subject_week', compact(['class_id', 'subject_id','subject']));
    }

    public function getSubjectWeekDayList($class_id, $subject_id, $term_id, $week_id)
    {
        return view('Student.student_subject.subject_week_day', compact(['class_id', 'subject_id', 'term_id', 'week_id']));
    }

    public function getSubjectData($subject_id)
    {
        $class_id = getClassId();

        $data = DB::table('subject')
            ->where('subject.id', '=', $subject_id)
            ->join('teacher_subject', 'teacher_subject.subject_id', '=', 'subject.id')
            ->join('teacher', 'teacher.id', '=', 'teacher_subject.teacher_id')
            ->select('subject.*','teacher.*')
            ->get();
        return view('Student.student_subject.subject_details', compact(['data', 'subject_id']));
    }

    public function getLessonData($class_id, $subject_id)
    {
        $data = Subject::where('id', $subject_id)->get();
        return view('Student.student_subject.subject', compact(['data', 'class_id', 'subject_id']));
    }

    // student_quiz 

    public function getAttentiveQuizList($class_id, $subject_id)
    {
        
        $quizList = DB::table('attentiveness_check')
            ->select(['attentiveness_check.*', 'Subject.subject_name'])
            ->join('class', 'class.id', '=', 'attentiveness_check.class_id')
            ->join('Subject', 'Subject.id', '=', 'attentiveness_check.subject_id')
            ->where('class_id', $class_id)
            ->where('subject_id', $subject_id)
            ->orderBy('attentiveness_check.id', 'desc')
            ->get();

        $admission_no = getAdmissionNo();
        

        $completed_quizes = DB::table('student_attentiveness_check')
            ->join('attentiveness_check', 'attentiveness_check.id', '=', 'student_attentiveness_check.A_check_id')
            ->where('admission_no', $admission_no)
            ->select('attentiveness_check.id as id', 'total_points', 'admission_no')
            ->get();
        $quizListarr = json_decode(json_encode($quizList), true);
        $completed_quizesarr = json_decode(json_encode($completed_quizes), true);

        if (empty($completed_quizesarr)) $completed_quizesarr = Null;

        $attemptedquizarr = array();

        if (isset($completed_quizesarr)) {
            foreach ($quizListarr as $key1 => $value1) {
                foreach ($completed_quizesarr as $key2 => $value2) {
                    if ($quizListarr[$key1]['id'] == $completed_quizesarr[$key2]['id']) {
                        $attemptedquizarr[] = array_merge($quizListarr[$key1], $completed_quizesarr[$key2]);
                        unset($quizListarr[$key1]);
                        break;
                    }
                }
            }
        }

        if (empty($attemptedquizarr)) $attemptedquizarr = Null;
        if (empty($quizListarr)) $quizListarr = Null;

        return view('Student.student_attentiveness_quiz.attentive_quizList', compact(['quizList', 'class_id', 'subject_id', 'quizListarr', 'attemptedquizarr']));
    }


    public function showAttentiveQuiz($a_check_id) //class_id,subject_id
    {
        $quiz = Attentiveness_check::find($a_check_id);
        $questions = Attentiveness_check_Question::where('a_check_id', $a_check_id)->get();
        return view('Student.student_attentiveness_quiz.attentive_quiz', compact(['quiz', 'questions', 'a_check_id']));
    }



    public function checkAttentiveQuiz(Request $request, $a_check_id)
    {
        $total_points = 0;
        $points_per_q = 5;
        $quiz = Attentiveness_check::find($a_check_id);
        $questions = Attentiveness_check_Question::where('a_check_id', $a_check_id)->get();

        $admission_no = getAdmissionNo();


        $data = $request->all();
        $answers_array = [];
        $correct_answers_array = $questions->pluck('correct_answer')->toArray();
        $question_count = 0;

        
        foreach ($data as $key => $datum) {
            if ($key != '_token' && $key != 'invisible') {
                $answers_array[$key] = $datum;
                $question_count++;
            }
        }
        
        $total_points = count(array_intersect_assoc($correct_answers_array, $answers_array)) * $points_per_q;
        $question_count *= $points_per_q;

        $quizrecord = Student_Attentiveness_check::where(['admission_no', $admission_no], ['A_check_id', $a_check_id]);
        // dd($quizrecord);
        // if () {
        //     # code...
        // }

        Student_Attentiveness_check::create(
            [
                'admission_no' => $admission_no,
                'A_check_id' => $a_check_id,
                'total_points' => $total_points
            ]
        );

        $completed_quiz = Student_Attentiveness_check::where('admission_no', $admission_no)->get();

        


        return view('Student.student_attentiveness_quiz.attentive_quizResult', compact(['quiz', 'questions', 'total_points', 'data', 'answers_array', 'correct_answers_array', 'question_count']));
    }
    


    // student_assessment

    public function getAssignmentList($class_id, $subject_id)
    {
        $today=Carbon::today();
        $nxt2weeks=Carbon::today()->addDays(14);
        $admission_no=getAdmissionNo();

        $assessmentList = DB::table('assessment')
            ->join('class', 'class.id', '=', 'assessment.class_id')
            ->join('Subject', 'Subject.id', '=', 'assessment.subject_id')
            ->join('Teacher', 'Teacher.id', '=', 'assessment.teacher_id')
            ->where('class_id', $class_id)
            ->where('subject_id', $subject_id)
            ->where('status','published')
            ->select(['assessment.*', 'Subject.subject_name as subject', 'Class.class_name as class', 'Teacher.full_name as teacher'])
            ->get();

        $completed_assessments=DB::table('student_assessment')
                        ->where('admission_no',$admission_no)
                        ->whereNotNull('answer_file')
                        ->orwhereNotNull('assessment_marks')
                        ->pluck('assessment_id');

        $due_ass=$assessmentList->whereBetween('due_date',[$today,$nxt2weeks]);
        $due_assignments=$due_ass->wherenotin('id',$completed_assessments);
        $due_assignmentsArr=json_decode(json_encode($due_assignments), true);

        $overdue_ass=$assessmentList->where('due_date','<',$today);
        $overdue_assignments=$overdue_ass->wherenotin('id',$completed_assessments);
        $overdue_assignmentsArr=json_decode(json_encode($overdue_assignments), true);


        $uploaded_assessment = DB::table('student_assessment')
            ->join('assessment', 'assessment.id', '=', 'student_assessment.assessment_id')
            ->where('admission_no', $admission_no)
            ->select('assessment.id as id', 'assessment_marks', 'admission_no','answer_file')
            ->get();

        $assessmentListarr = json_decode(json_encode($assessmentList), true);
        $uploaded_assessmentsarr = json_decode(json_encode($uploaded_assessment), true);

        if (empty($uploaded_assessmentarr)) $uploaded_assessmentarr = Null;

        $mergedAssList = array();

        
        if (isset($uploaded_assessmentsarr)) {
            foreach ($assessmentListarr as $key1 => $value1) {
                foreach ($uploaded_assessmentsarr as $key2 => $value2) {
                    if ($assessmentListarr[$key1]['id'] == $uploaded_assessmentsarr[$key2]['id']) {
                        $mergedAssList[] = array_merge($assessmentListarr[$key1], $uploaded_assessmentsarr[$key2]);
                        unset($assessmentListarr[$key1]);
                        break;
                    }
                }
            }
        }

        if (empty($overdue_assignmentsArr)) $due_assignmentsArr = Null;
        if (empty($due_assignmentsArr)) $due_assignmentsArr = Null;
        if (empty($mergedAssList)) $mergedAssList = Null;
        if (empty($assessmentListarr)) $assessmentListarr = Null;
        return view('Student.student_assignment.assignments', compact(['assessmentListarr', 'class_id', 'subject_id', 'uploaded_assessmentsarr', 'mergedAssList','due_assignmentsArr','overdue_assignmentsArr']));
    }



    public function uploadHomework($class_id, $subject_id, $assessment_id)
    {
        $class_id = $class_id;
        $subject_id = $subject_id;
        $assessment = Assesment::find($assessment_id);

        return view('Student.student_assignment.uploadHomework', compact(['assessment_id', 'assessment', 'class_id', 'subject_id']));
    }


    public function editHomework(Request $request, $class_id, $subject_id, $assessment_id)
    {
        $class_id = $class_id;
        $subject_id = $subject_id;
        $admission_no = getAdmissionNo();
        $assessment = Assesment::find($assessment_id);
        $uploaded_assessment = Student_assesment::where([['assessment_id', $assessment_id], ['admission_no', $admission_no]])->first();
        return view('Student.student_assignment.editHomework', compact(['assessment_id', 'assessment', 'class_id', 'subject_id', 'uploaded_assessment']));
    }


    public function storeHomework(Request $request, $class_id, $subject_id, $assessment_id)
    {

        $validatedData = $request->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048',

        ]);

        $admission_no = getAdmissionNo();

        $submission = Student_assesment::where([['assessment_id', $assessment_id], ['admission_no', $admission_no]])->first();

        $name = $request->name;
        $filename = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->move('submissions', $filename);

        if (isset($submission)) {
            $submission->answer_file= $path;
            $submission->save();
            return redirect()->route('Student.student.homeworklist', [$class_id, $subject_id])->with('message', 'submission Has been updated successfully');
        } else {

            Student_assesment::create(
                [
                    'assessment_id' => $assessment_id,
                    'admission_no' => $admission_no,
                    'uploaded_date' => now()->format('y-m-d'),
                    'answer_file' => $path
                ]
            );
            return redirect()->route('Student.student.homeworklist', [$class_id, $subject_id])->with('message', 'File Has been uploaded successfully');
        }
    }
    public function getRecordingslist($class_id, $subject_id)
    {
        //$recordings = relink::where([['class_id', $class_id], ['subject_id', $subject_id]])->orderByDesc('date')->get();
        return view('Student.student_relink.relinklist', compact(['recordings', 'class_id', 'subject_id']));
    }

    public function getResourceList($class_id, $subject_id)
    {
        $notes = Resource::where([['subject_id',$subject_id],['class_id',$class_id],['resource_type','note']])->orderby('week')->get();
        $links = Resource::where([['subject_id',$subject_id],['class_id',$class_id],['resource_type','reference_link']])->orderby('week')->get();


        return view('Student.student_resource.resourcelist', compact(['notes','links', 'class_id', 'subject_id']));
    }

    public function getRecordbook($class_id, $subject_id)
    {
        $records = DB::table('class_record')->where([['subject_id',$subject_id],['class_id',$class_id]])->orderby('day','desc')->get();
        return view('Student.student_recordbook.recordBook', compact(['records','class_id', 'subject_id']));
    }


        // student_assessment quiz 

        public function getQuizList($class_id, $subject_id, $term, $week, $date)
        {
            $term='term'.$term;
            $week='week'.$week;
    
            $quizList = DB::table('assessment')
                ->select(['assessment.*', 'Subject.subject_name'])
                ->join('class', 'class.id', '=', 'assessment.class_id')
                ->join('Subject', 'Subject.id', '=', 'assessment.subject_id')
                ->where('assessment_type','mcq_quiz')
                ->where('class_id', $class_id)
                ->where('subject_id', $subject_id)
                ->where('term', $term)
                ->where('week', $week)
                ->orderBy('assessment.id', 'desc')
                ->get();

    
            $admission_no = getAdmissionNo();
            
    
            $completed_quizes = DB::table('student_assessment')
                ->join('assessment', 'assessment.id', '=', 'student_assessment.assessment_id')
                ->where('admission_no', $admission_no)
                ->select('assessment.id as id', 'assessment_marks', 'admission_no')
                ->get();
            $quizListarr = json_decode(json_encode($quizList), true);
            $completed_quizesarr = json_decode(json_encode($completed_quizes), true);
    
            if (empty($completed_quizesarr)) $completed_quizesarr = Null;
    
            $attemptedquizarr = array();
    
            if (isset($completed_quizesarr)) {
                foreach ($quizListarr as $key1 => $value1) {
                    foreach ($completed_quizesarr as $key2 => $value2) {
                        if ($quizListarr[$key1]['id'] == $completed_quizesarr[$key2]['id']) {
                            $attemptedquizarr[] = array_merge($quizListarr[$key1], $completed_quizesarr[$key2]);
                            unset($quizListarr[$key1]);
                            break;
                        }
                    }
                }
            }
    
            if (empty($attemptedquizarr)) $attemptedquizarr = Null;
            if (empty($quizListarr)) $quizListarr = Null;
    
            return view('Student.student_assignment.quizList', compact(['quizList', 'class_id', 'subject_id', 'quizListarr', 'attemptedquizarr']));
        }
    
    
        public function showQuiz($assessment_id) //class_id,subject_id
        {
            $quiz = Assesment::find($assessment_id);
            $questions = Assessment_quiz_question::where('assessment_id', $assessment_id)->get();
            return view('Student.student_assignment.mcq_quiz', compact(['quiz', 'questions', 'assessment_id']));
        }
    
    
    
        public function checkQuiz(Request $request, $assessment_id)
        {
            $total_points = 0;
            $points_per_q = 5;
            $quiz =Assesment::find($assessment_id);
            $questions =  Assessment_quiz_question::where('assessment_id', $assessment_id)->get();
    
            $admission_no = getAdmissionNo();
    
    
            $data = $request->all();
            $answers_array = [];
            $correct_answers_array = $questions->pluck('correct_answer')->toArray();
            $question_count = 0;
    
            
            foreach ($data as $key => $datum) {
                if ($key != '_token' && $key != 'invisible') {
                    $answers_array[$key] = $datum;
                    $question_count++;
                }
            }
            
            $total_points = count(array_intersect_assoc($correct_answers_array, $answers_array)) * $points_per_q;
            $question_count *= $points_per_q;
    
            $quizrecord = Student_assesment::where(['admission_no', $admission_no], ['assessment_id', $assessment_id]);
            // dd($quizrecord);
            // if () {
            //     # code...
            // }
    
            Student_assesment::create(
                [
                    'admission_no' => $admission_no,
                    'assessment_id' => $assessment_id,
                    'uploaded_date'=> Carbon::now()->format('Y-m-d'),
                    'answer_file' => NULL,
                    'assessment_marks' => $total_points
                ]
            );
    
            $completed_quiz = Student_assesment::where([['admission_no', $admission_no],['answer_file',NULL]])->get();
    
            
    
    
            return view('Student.student_assignment.quizResult', compact(['quiz', 'questions', 'total_points', 'data', 'answers_array', 'correct_answers_array', 'question_count']));
        }

        public function getExamResults()
        {
            $admission_no=getAdmissionNo();
            $results = DB::table('exam_result')
                    ->join('subject', 'subject.id', '=', 'exam_result.subject_id')
                    ->join('teacher', 'teacher.id', '=', 'exam_result.teacher_id')
                    ->where('admission_no',$admission_no)
                    ->select(['exam_result.*','subject.subject_name','teacher.full_name'])
                    ->get();

            $term1=$results->where('term','term1');
            $term2=$results->where('term','term2');
            $term3=$results->where('term','term3');

            $term1avg=$term1->avg('marks');
            $term2avg=$term2->avg('marks');
            $term3avg=$term3->avg('marks');

            return view('Student.student_examResult.examResults', compact(['results','term1','term2','term3','term1avg','term2avg','term3avg']));
        }
}
