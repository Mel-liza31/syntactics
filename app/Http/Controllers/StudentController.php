<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function index() {
        $students = Student::all();
        return view('welcome',compact('students'));
    }
    public function create() {
        return view('create');
    }
    public function store(Request $request) {
        $this->validate($request,[
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required'
        ]);

        $student = new Student;
        $student->first_name=$request->firstname;
        $student->last_name=$request->lastname;
        $student->address=$request->address;
        $student->phone=$request->phone;
        $student->email=$request->email;
        $student->save();
        return redirect(route('home'))->with('successMsg','Student Successfully ADDED');
    }
    public function edit($id) {
        $student= Student::find($id);
        return view('edit',compact('student'));
    }
    public function update(Request $request, $id) {
        $this->validate($request,[
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required'
        ]);

        $student = Student::find($id);
        $student->first_name=$request->firstname;
        $student->last_name=$request->lastname;
        $student->address=$request->address;
        $student->phone=$request->phone;
        $student->email=$request->email;
        $student->save();
        return redirect(route('home'))->with('successMsg','Student Successfully UPDATED');
    }
    public function delete($id) {
       Student::find($id)->delete();
        return redirect(route('home'))->with('successMsg','Student Successfully DELETED');
    }
    public function search(Request $request){
        $q = $this->$request->input('q');
        $students = Student::where('first_name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
        if(count($user) > 0)
            return view('welcome')->withDetails($students)->withQuery ( $q );
        else return view ('welcome')->withMessage('No Details found. Try to search again !');

    }
}
