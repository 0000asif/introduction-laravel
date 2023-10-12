<?php

namespace App\Http\Controllers;
use App\Models\student;
use Illuminate\Http\Request;
use carbon\carbon;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\support\Facades\Validator;

class productController extends Controller
{
    function index(){
        $a['students'] = student::all();
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
            'email'=>['required','email'],
        ]);
        if($rules->fails()){
            return redirect()->back()->withErrors($rules)->withInput();
        }



        $insert = new student;
        $insert->name = $add->name;
        $insert->roll = $add->roll;
        $insert->reg = $add->reg;
        $insert->email = $add->email;
        $insert->save();
        return redirect()->Route('student.index')->with('success','Data insert successfull');

    }
    function edit($id){
        $a['student'] = student::findOrFail($id);
        return view('student.edit', $a);
    }
    function update( Request $add , $id ){

        $student = student::findOrFail($id);
        $student->name = $add->name;
        $student->roll = $add->roll;
        $student->reg = $add->reg;
        $student->email = $add->email;
        $student->updated_at = Carbon::now();
        $student->update();
        return redirect()->Route('student.index');

    }
    function delete($id){
        $student = student::findOrFail($id);
        $student->delete();
        return redirect()->Route('student.index');
    }
}
