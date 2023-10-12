<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adviser;
use Session;
use App\Http\Requests\StoreAdviser;

class AdviserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $advisers = Adviser::where([['status', '=', '1'], ['lec_id', '<>', '01'],])->get();
      return view('advisers.home', ['page' => 'adviser', 'advisers' => $advisers]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('advisers.new', ['page' => 'adviser_new']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdviser $request)
    {
      $validated = $request->validated();

      $input = $request->all();
      $input['image'] = 'nophoto.jpg';
      if($file = $request->file('image')) {
        $name = time().$file->getClientOriginalName();
        $file->move('uploads/images',$name);
        $input['image']=$name;
      }
      /*$input['lec_id'] = $request->lec_id;
      $input['personal_id'] = $request->personal_id;
      $input['user_name'] = $request->user_name;
      $input['lec_title1'] = $request->lec_title1;
      $input['lec_title2'] = $request->lec_title2;
      $input['lec_fname'] = $request->lec_fname;
      $input['lec_lname'] = $request->lec_lname;
      $input['academic_name'] = $request->academic_name;
      $input['abbreviation'] = $request->abbreviation;
      $input['major'] = $request->major;*/
      Adviser::create($input);
      Session::flash('add_new_adviser', 'ได้ทำการเพิ่มข้อมูลอาจารย์ใหม่ในฐานข้อมูลเรียบร้อยแล้ว');
      return redirect('/advisers');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $adviser = Adviser::findOrFail($id);
      return view('advisers.show', ['adviser' => $adviser, 'page' => 'adviser']);
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
      $advisers = Adviser::findOrFail($id);
      return view('advisers.edit', ['adviser' => $advisers, 'page' => 'adviser']);
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
      $adviser = Adviser::findOrFail($id);
      $adviser->update($input);
      //Lecturer::updateOrCreate($request->all($id));
      /*$lec_id = $request->input('lec_id');
      $personal_id = $request->input('personal_id');
      $user_name = $request->input('user_name');
      $lec_title1 = $request->input('lec_title1');
      $lec_title2 = $request->input('lec_title2');
      $lec_fname = $request->input('lec_fname');
      $lec_lname = $request->input('lec_lname');
      $academic_name = $request->input('academic_name');
      $abbreviation = $request->input('abbreviation');
      $major = $request->input('major');
      DB::update('UPDATE tbl_lecturers SET lec_id = ?, personal_id = ?, user_name = ?, lec_title1 = ?, lec_title2 = ?, lec_fname = ?, lec_lname = ?, academic_name = ?, abbreviation = ?, major = ? WHERE id = ?', [$lec_id, $personal_id, $user_name, $lec_title1, $lec_title2, $lec_fname, $lec_lname, $academic_name, $abbreviation, $major, $id]);*/
      Session::flash('update_adviser', 'ได้ทำการอัพเดทข้อมูลในฐานข้อมูลเรียบร้อยแล้ว');
      return redirect('/advisers/'.$id);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $input['status'] = '0';
      $adviser = Adviser::findOrFail($id);
      //unlink(public_path() . '/uploads/images/' . $lecturer->image);
      //$lecturer->delete();
      $adviser->update($input);

      //Lecturer::destroy($id);
      Session::flash('delete_adviser', 'ได้ทำการลบข้อมูลอาจารย่ในฐานข้อมูลเรียบร้อยแล้ว');
      return redirect('/advisers');
        //
    }
}
