<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 2){
            return redirect()->route('student.index');
        }
        $admins = User::where('role','0')->get();
        return view('admin.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role =! 0)
        {
        return redirect()->route('admin.index');
    }
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
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
            $newName = 'admin_'.uniqid().'.'.$file->extension();
            $file->storeAs('public/admin',$newName);
        }
        $admin = new User();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->date_of_birth = $request->date_of_birth;
        $admin->gender = $request->gender;
        $admin->address = $request->address;
        $admin->role = '0';
        $admin->profile = $newName;
        $admin->save();
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('admin.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminRequest  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, $id)
    {
        $request->validate([
            'name'=>'required |unique:users,name',
            'email'=>'required',
            'phone'=>'required',
            'date_of_birth'=>'required | after:1943-12-31 | before:2004-01-01',
            'gender'=>'required',
            'address'=>'required',
        ]);

        $admin = User::findOrFail($id);

        if($request->profile){
            $file = $request->profile;
            $newName = 'admin_'.uniqid().'.'.$file->extension();
            $file->storeAs('public/admin',$newName);
            $admin->profile = $newName;
        }

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->date_of_birth = $request->date_of_birth;
        $admin->gender = $request->gender;
        $admin->address = $request->address;
        $admin->role = '0';
        $admin->update();
        return redirect()->route('admin.index');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user){
            $user->delete();
        }
        return redirect()->route('admin.index');
    }
}