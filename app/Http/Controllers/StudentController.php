<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::orderBy('last_name')->get();

        return inertia('Students/Index', [
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Students/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'last_name'         => 'string|required',
            'first_name'  => 'string|required',
            'mid_name'     => 'string|required',
            'birthdate'      => 'date|required',
            'age'      => 'integer|required',
            'address'      => 'string|required',
            'num'      => 'integer|required',
            'course'      => 'string|required',
            'year_level'      => 'integer|required',
            'email'      => 'string|required'
        ]);

        $fileName = null;

        if ($request->img) {
            $fileName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('uploads/img'), $fileName);
            $fields['img'] = $fileName;
        }

        Student::create($fields);

        return redirect()->route('students')->banner('Student information saved.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return inertia('Students/ShowStudent', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return inertia('Students/Edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'last_name'         => 'string|required',
            'first_name'  => 'string|required',
            'mid_name'     => 'string|required',
            'birthdate'      => 'date|required',
            'age'      => 'integer|required',
            'address'      => 'string|required',
            'num'      => 'integer|required',
            'course'      => 'string|required',
            'year_level'      => 'integer|required',
            'email'      => 'string|required',
        ]);

        $student->update($request->all());

        $request->session()->flash('flash.banner', 'Student Info updated successfully.');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect('/students/' . $student->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students')->dangerBanner('Student information removed successfully.');
    }

    public function search($searchKey)
    {
        return inertia('Students/Index', [
            'students' => Student::where('course', 'like', "%$searchKey%")->
            orWhere('year_level', 'like', "%$searchKey%")
            ->get()
        ]);
    }

    public function toggleActive(Student $student)
    {
        $student->scholar = !$student->scholar;
        $student->save();

        return back();
    }

    public function email(Student $student, Request $request) {

        Mail::send('emails.mail',['student'=>$student], function($message) use($student) {
        $message->to($student->email);
        $message->subject('Hi');
    });

    $request->session()->flash('flash.banner', 'Email sent successfully');
    $request->session()->flash('flash.bannerStyle', 'success');

    return back();
    }
}
