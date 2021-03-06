<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data=Teacher::all()->toArray();
        //$data=Teacher::all()->toArray();
        $data=Teacher::paginate(3);
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

        $msg=[
            //'name.required'=>'Name must required',
            'name.min'=>'Name min 5 charecter',


            ];

        $validatedData =  Validator::make($request->all(),[
        'name' => 'required|min:5',
        //'gender' => 'required|email|unique:users',
        'gender' => 'required',
        //'desi' => 'required|min:6',
        'desi' => 'required',
        //'district' => 'required|min:6',
        'district' => 'required',
        ], $msg);

        if ($validatedData->fails()) {
            return redirect('teacher/create')->withErrors($validatedData)->withInput();
            //return redirect()->back()->withErrors($validatedData)->withInput();
            return back()->withErrors($validatedData)->withInput();
        }

        $data = new Teacher([
          // 'name' => $request->get('name'),
          // 'gender' => $request->get('gender'),
          // 'desi' => $request->get('desi'),
          // 'district' => $request->get('district'),

        

          'name' => $request->name,
          'fileToUpload'=>$request->fileToUpload->store('logos','public'),
          'gender' => $request->gender,
          'desi' => $request->desi,
          'district' => $request->get('district'),
        ]);

        // $photo = $request->file('fileToUpload');
        // Storage::putFile('public/logos',$photo);
        // $data->fileToUpload = $request->fileToUpload->store('storage/logos');


        $data->save();
        return redirect()->back()->withSuccess('Successfully added!');
        //return redirect('/teacher')->withSuccess('IT WORKS!');
        //return redirect('/teacher')->with('success', 'Successfully added!');
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
         $data = Teacher::find($id);
      $data->delete();

      return redirect('/teacher');
    }
}
