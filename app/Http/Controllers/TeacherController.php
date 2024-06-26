<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = User::where('role','1')->get();
        return view('teacher.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role == 2)
        {
        return redirect()->route('student.index');
    }
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTeacherRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeacherRequest $request)
    {
        // return $request;
        $request->validate([
            'name'=>'required |unique:users,name',
            'email'=>'required',
            'phone'=>'required',
            'date_of_birth'=>'required | after:1943-12-31 | before:2004-01-01',
            'gender'=>'required',
            'address'=>'required',
            'profile'=>'required',
        ]);

        if($request->profile){
            $file = $request->profile;
            $newName = 'teacher_'.uniqid().'.'.$file->extension();
            $file->storeAs('public/teacher',$newName);
        }
        $teacher = new User();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->date_of_birth = $request->date_of_birth;
        $teacher->gender = $request->gender;
        $teacher->address = $request->address;
        $teacher->role = '1';
        $teacher->profile = $newName;
        $teacher->save();
        return redirect()->route('teacher.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = User::findOrFail($id);
        return view('teacher.edit',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTeacherRequest  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeacherRequest $request,$id)
    {
        $request->validate([
            'name'=>'required |unique:users,name',
            'email'=>'required',
            'phone'=>'required',
            'date_of_birth'=>'required | after:1943-12-31 | before:2004-01-01',
            'gender'=>'required',
            'address'=>'required',
        ]);

        $teacher = User::findOrFail($id);

        if($request->profile){
            $file = $request->profile;
            $newName = 'teacher_'.uniqid().'.'.$file->extension();
            $file->storeAs('public/teacher',$newName);
            $teacher->profile = $newName;
        }

        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->date_of_birth = $request->date_of_birth;
        $teacher->gender = $request->gender;
        $teacher->address = $request->address;
        $teacher->role = '1';
        $teacher->update();
        return redirect()->route('teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user){
            $user->delete();
        }
        return redirect()->route('teacher.index');
    }
}