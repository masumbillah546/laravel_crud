<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Teacher::all()->toArray();
        return view('teacher.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Teacher([
          // 'name' => $request->get('name'),
          // 'gender' => $request->get('gender'),
          // 'desi' => $request->get('desi'),
          // 'district' => $request->get('district'),

            'name' => $request->name,
          'gender' => $request->gender,
          'desi' => $request->desi,
          'district' => $request->get('district'),
        ]);

        $data->save();
        return redirect('/teacher');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
       return view('teacher.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    //public function edit(Teacher $teacher)
    public function edit( $teacher2)
    {   
        //$data = Teacher::find($teacher);
        // echo "<pre>";
        // print_r($teacher);
      $teacher = Teacher::find($teacher2);
         
       // $data = $teacher['id'];
        return view('teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, Teacher $teacher)
    public function update(Request $request, $id)
    {
       $data = Teacher::find($id);
        $data->name = $request->name;
        $data->gender = $request->gender;
        $data->desi = $request->desi;
        $data->district = $request->district;    
        $data->save();
        return redirect('/teacher');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    //public function destroy(Teacher $teacher)
    public function destroy($id)
    {
         $data = Teacher::find($teacher);
      $data->delete();

      return redirect('/teacher');
    }
}
