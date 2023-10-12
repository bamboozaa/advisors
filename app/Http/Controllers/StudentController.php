<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Adviser;
use Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $students = Student::all();
      return view('students.home', ['students' => $students, 'page' => 'student']);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $id)
    {
      $advisers = Adviser::selectRaw("CONCAT (lec_title2, ' ', lec_fname, ' ', lec_lname) as fullname, lec_id")->pluck('fullname', 'lec_id');
      //dd($lecturers);
      function decode($string) {
        $url_send = base64_decode(base64_decode($string));
        return $url_send;
      }

      $facultyname = decode($id->id);
      $student_id = decode($id->sid);
      $std_title = decode($id->tle);
      $std_fname = decode($id->fname);
      $std_lname = decode($id->lname);
      $programname = decode($id->prg);

      if (Student::where('student_id', '=', $student_id)->count() > 0) {
        //return 'Hello World';
        //$students = Student::findOrFail($student_id);
        $students = Student::where('student_id', '=', $student_id)->firstOrFail();
        //dd($students);
        //$student = Student::where('student_id', '=', $student_id);
        //$student = Student::where('student_id', '=', $student_id);
        //dd($student);
        //return view('advisors.students'.$student_id.'edit', ['student' => $student]);
        return view('students.edit',['advisers' => $advisers, 'student' => $students, 'page' => 'student']);
      } else {
        return view('students.new', ['page' => 'student', 'advisers' => $advisers, 'facultyname' => $facultyname, 'student_id' => $student_id, 'std_title' => $std_title, 'std_fname' => $std_fname, 'std_lname' => $std_lname, 'programname' => $programname]);
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $input = $request->all();
      Student::create($input);
      Session::flash('add_new_student', 'ได้ทำการเพิ่มข้อมูลนักศึกษาใหม่ในฐานข้อมูลเรียบร้อยแล้ว');
      return redirect('/students');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $advisers = Adviser::selectRaw("CONCAT (lec_title2, ' ', lec_fname, ' ', lec_lname) as fullname, lec_id")->pluck('fullname', 'lec_id');
      $students = Student::findOrFail($id);
      //dd($students);
      return view('students.edit', ['advisers' => $advisers, 'student' => $students, 'page' => 'student']);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $input = $request->all();
      $student = Student::findOrFail($id);
      $student->update($input);
      Session::flash('update_student', 'ได้ทำการอัพเดทข้อมูลนักศึกษาในฐานข้อมูลเรียบร้อยแล้ว');
      return redirect('/students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
