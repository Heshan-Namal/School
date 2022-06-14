<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Student;
use App\Models\Grade;
use App\Models\Classroom;
use App\Models\Attentiveness_check;
use App\Models\Assignment;
use App\Models\Attentiveness_check_Question;
use App\Models\Subject;
use App\Models\student_assignment;
use App\Models\Student_Attentiveness_check;
use App\Models\relink;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Validator;

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

    public function getSubjectsList($student_id)
    {
        $data = DB::table('Student')
            ->where('Student.id', '=', $student_id)
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

        return view('Student.student_subject.subject_week', compact(['class_id', 'subject_id']));
    }

    public function getSubjectWeekDayList($class_id, $subject_id, $term_id, $week_id)
    {
        return view('Student.student_subject.subject_week_day', compact(['class_id', 'subject_id', 'term_id', 'week_id']));
    }

    public function getSubjectData($class_id, $subject_id)
    {
        $data = Subject::where('id', $subject_id)->get();
        return view('Student.student_subject.subject', compact(['data', 'class_id', 'subject_id']));
    }

    public function getLessonData($class_id, $subject_id)
    {
        $data = Subject::where('id', $subject_id)->get();
        return view('Student.student_subject.subject', compact(['data', 'class_id', 'subject_id']));
    }

    // student_quiz 

    public function getquizList($class_id, $subject_id, $term, $week, $day)
    {

        $quizList = DB::table('attentiveness_check')
            ->select(['attentiveness_check.*', 'Subject.subject_name'])
            ->join('class', 'class.id', '=', 'attentiveness_check.class_id')
            ->join('Subject', 'Subject.id', '=', 'attentiveness_check.subject_id')
            ->where('class_id', $class_id)
            ->where('subject_id', $subject_id)
            ->where('term', $term)
            ->where('week', $week)
            ->where('day', $day)
            ->orderBy('attentiveness_check.id', 'desc')
            ->get();

        $student_id = Auth::user()->id; //id in user table does not match id in student table :\
        $admission_no = Student::where('id',$student_id)->get();
        dd($admission_no);

        $completed_quizes = DB::table('student_attentiveness_check')
            ->join('attentiveness_check', 'attentiveness_check.id', '=', 'student_attentiveness_check.A_check_id')
            ->where('admission_no', $student_id)
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


    public function showquiz($a_check_id) //class_id,subject_id
    {
        $quiz = Attentiveness_check::find($a_check_id);
        $questions = Attentiveness_check_Question::where('a_check_id', $a_check_id)->get();
        return view('Student.student_attentiveness_quiz.attentive_quiz', compact(['quiz', 'questions', 'a_check_id']));
    }



    public function checkquiz(Request $request, $a_check_id)
    {
        $marks = 0;
        $marks_per_q = 5;
        $quiz = Attentiveness_check::find($a_check_id);
        $questions = Attentiveness_check_Question::where('a_check_id', $a_check_id)->get();
        $student_id = Auth::user();
        $admission_no = $student->admission_no;
        dd($student);
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

        $total_points = count(array_intersect_assoc($correct_answers_array, $answers_array)) * $marks_per_q;
        $question_count *= $marks_per_q;

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


    // student_assignment

    public function getAssignmentList($class_id, $subject_id)
    {
        $assignmentList = DB::table('Assignment')
            ->join('class', 'class.id', '=', 'Assignment.class_id')
            ->join('Subject', 'Subject.id', '=', 'Assignment.subject_id')
            ->join('Teacher', 'Teacher.id', '=', 'Assignment.teacher_id')
            ->where('class_id', $class_id)
            ->where('subject_id', $subject_id)
            ->select(['Assignment.*', 'Subject.name as subject', 'Class.name as class', 'Teacher.name as teacher'])
            ->get();

        $student = Auth::user();
        $student_id = $student->id;

        $uploaded_assignments = DB::table('Assignment_student')
            ->join('Assignment', 'Assignment.id', '=', 'Assignment_student.assignment_id')
            ->where('student_id', $student_id)
            ->select('Assignment.id as id', 'Assignment_student.status as grading_status', 'grade', 'student_id')
            ->get();

        $assignmentListarr = json_decode(json_encode($assignmentList), true);
        $uploaded_assignmentsarr = json_decode(json_encode($uploaded_assignments), true);

        if (empty($uploaded_assignmentsarr)) $uploaded_assignmentsarr = Null;

        $mergedAssList = array();

        if (isset($uploaded_assignmentsarr)) {
            foreach ($assignmentListarr as $key1 => $value1) {
                foreach ($uploaded_assignmentsarr as $key2 => $value2) {
                    if ($assignmentListarr[$key1]['id'] == $uploaded_assignmentsarr[$key2]['id']) {
                        $mergedAssList[] = array_merge($assignmentListarr[$key1], $uploaded_assignmentsarr[$key2]);
                        unset($assignmentListarr[$key1]);
                        break;
                    }
                }
            }
        }
        if (empty($mergedAssList)) $mergedAssList = Null;
        if (empty($assignmentListarr)) $assignmentListarr = Null;
        return view('Student.student_assignment.assignments', compact(['assignmentList', 'assignmentListarr', 'class_id', 'subject_id', 'uploaded_assignmentsarr', 'mergedAssList']));
    }



    public function uploadHomework($class_id, $subject_id, $assignment_id)
    {
        $class_id = $class_id;
        $subject_id = $subject_id;
        $assignment = Assignment::find($assignment_id);
        return view('Student.student_assignment.uploadHomework', compact(['assignment_id', 'assignment', 'class_id', 'subject_id']));
    }


    public function editHomework(Request $request, $class_id, $subject_id, $assignment_id)
    {
        $class_id = $class_id;
        $subject_id = $subject_id;
        $student = Auth::user();
        $student_id = $student->id;
        $assignment = Assignment::find($assignment_id);
        $uploaded_assignment = student_assignment::where([['assignment_id', $assignment_id], ['student_id', $student_id]])->first();
        return view('Student.student_assignment.editHomework', compact(['assignment_id', 'assignment', 'class_id', 'subject_id', 'uploaded_assignment']));
    }


    public function storeHomework(Request $request, $class_id, $subject_id, $assignment_id)
    {

        $validatedData = $request->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048',

        ]);
        $student = Auth::user();
        $student_id = $student->id;

        $submission = student_assignment::where([['assignment_id', $assignment_id], ['student_id', $student_id]])->first();

        $name = $request->name;
        $filename = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->move('submissions', $filename);

        if (isset($submission)) {
            $submission->submission_name = $name;
            $submission->submission_path = $path;
            $submission->save();
            return redirect()->route('Student.student.homeworklist', [$class_id, $subject_id])->with('message', 'submission Has been updated successfully');
        } else {

            student_assignment::create(
                [
                    'assignment_id' => $assignment_id,
                    'student_id' => $student_id,
                    'status' => 'submitted',
                    'submission_name' => $name,
                    'submission_path' => $path
                ]
            );
            return redirect()->route('Student.student.homeworklist', [$class_id, $subject_id])->with('message', 'File Has been uploaded successfully');
        }
    }
    public function getRecordingslist($class_id, $subject_id)
    {
        $recordings = relink::where([['class_id', $class_id], ['subject_id', $subject_id]])->orderByDesc('date')->get();
        return view('Student.student_relink.relinklist', compact(['recordings', 'class_id', 'subject_id']));
    }
}
