<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use App\Course;
use App\Mail\StudentCreatedMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class AdminStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::where('admin', false)->get();

        return view('admin.students.index', ['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('admin.students.create', array('courses'=>$courses));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required|string',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
        $student_id = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);

        $password = Str::random(10);

        // dd($password);
        $student = new User();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = Hash::make($password);

        if($request->type_of_user == 1){
            $student->admin = true;
        }else{
            $student->course_id = $request->course;
            $student->student_id = $student_id;
        }

        if($request->hasFile('photo')){
            $path = $request->file('photo')->store('photos', 'public');
            $student->photo = $path;
        }

        $student->save();

        try{
            //send password to the students email
            Mail::to($student->email)->send(new StudentCreatedMail($student, $password));
        }catch(\Exception $e){
            return redirect()->back()->with('info', 'Registration Successful. Your password is: '. $password);
        }

        return redirect()->route('students.index')->with('success', 'User Successfully Registered');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $student = User::find($id);

        return view('admin.students.show', ['student'=>$student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = User::find($id);
        $courses = Course::all();

        return view('admin.students.edit', ['student'=>$student, 'courses'=>$courses]);
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
        $this->validate($request, [
            'name' => 'required|string',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
        ]);

        $student = User::find($id);
        $student->name = $request->name;
        $student->email = $request->email;

        if($request->hasFile('photo')){
            if($student->photo){
                Storage::delete($student->photo);
            }
            $path = $request->file('photo')->store('photos', 'public');
            $student->photo = $path;
        }

        $student->save();

        return redirect()->route('students.index')->with('success', 'Student updated sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = User::find($id);

        //delete the photo if student has
        if($student->photo){
            Storage::delete($student->photo);
        }
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student successfully deleted');
    }
}
