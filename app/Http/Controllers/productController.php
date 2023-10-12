<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use carbon\carbon;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;
use Illuminate\support\Facades\Validator;

class productController extends Controller
{
    function index(){
        $a['students'] = Student::all();
        return view('student.index',$a);
    }
    function create(){
        return view('student.create');
    }


    function store(Request $add){
        $rules= Validator::make($add->all() , [
            'name' => ['required','string','max:255'],
            'roll'=>['required','numeric'],
            'reg'=>['required','numeric'],
            'email'=>['required','email','unique:students,email'],
            'image'=>['required','image','mimes:jpeg,png,jpg,gif,webp','max:2048'],
        ]);
        if($rules->fails()){
            return redirect()->back()->withErrors($rules)->withInput();
        }
        $insert = new Student();

        if ($add->hasFile('image')) {
             $image = $add->file('image');
             $path = $image->store("students/",'public');
             $insert->image=$path;
        }


        $insert->name = $add->name;
        $insert->roll = $add->roll;
        $insert->reg = $add->reg;
        $insert->email = $add->email;
        $insert->save();
        return redirect()->route('student.index')->with('success','Data insert successfull');

    }


    function edit($id){
        $a['student'] = Student::findOrFail($id);
        return view('student.edit', $a);
    }
    function update( Request $add , $id ){
        // dd($add->all());
        $rules= Validator::make($add->all() , [
            'name' => ['required','string','max:255'],
            'roll'=>['required','numeric'],
            'reg'=>['required','numeric'],
            // 'email'=>['required','email','unique:student,email'],
            'image'=>['nullable','image','mimes:jpeg,png,jpg,gif,webp','max:2048'],
        ]);
        if($rules->fails()){
            return redirect()->back()->withErrors($rules)->withInput();
        }
        $student = Student::findOrFail($id);

        if ($add->hasFile('image')) {
            $image = $add->file('image');
            $path = $image->store("students",'public');
            // unlink($student->image);
            Storage::delete('public/', $add->image);
            $student->image=$path;
       }



        $student->name = $add->name;
        $student->roll = $add->roll;
        $student->reg = $add->reg;
        $student->email = $add->email;
        $student->updated_at = Carbon::now();
        $student->update();
        return redirect()->Route('student.index')->with('success','Data update successfull');

    }
    function delete($id){
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->Route('student.index');
    }
}
