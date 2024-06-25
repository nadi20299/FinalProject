<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\User;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::where('role','2')->get();
        return view('student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        $request->validate([
            'name'=>'required |unique:users,name',
            'email'=>'required',
            'phone'=>'required',
            'date_of_birth'=>'required | after:1943-12-31 | before:2023-01-01',
            'gender'=>'required',
            'address'=>'required',
            'profile'=>'required',
        ]);

        if($request->profile){
            $file = $request->profile;
            $newName = 'student_'.uniqid().'.'.$file->extension();
            $file->storeAs('public/student',$newName);
        }
        $student = new User();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->date_of_birth = $request->date_of_birth;
        $student->gender = $request->gender;
        $student->role = '2';
        $student->address = $request->address;
        $student->profile = $newName;
        $student->save();
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = User::findOrFail($id);
        return view('student.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request,$id)
    {
        $request->validate([
            'name'=>'required |unique:users,name',
            'email'=>'required',
            'phone'=>'required',
            'date_of_birth'=>'required | after:1973-12-31 | before:2023-01-01',
            'gender'=>'required',
            'address'=>'required',
        ]);

        $student = User::findOrFail($id);

        if($request->profile){
            $file = $request->profile;
            $newName = 'student_'.uniqid().'.'.$file->extension();
            $file->storeAs('public/student',$newName);
            $student->profile = $newName;
        }

        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->date_of_birth = $request->date_of_birth;
        $student->gender = $request->gender;
        $student->role = '2';
        $student->address = $request->address;
        $student->update();
        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user){
            $user->delete();
        }
        return redirect()->route('student.index');
    }
}