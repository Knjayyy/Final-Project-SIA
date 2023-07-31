<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index() {
        return inertia('Admin/Index');
    }

    public function sendEmailToAll(Request $request) {

        $student = Student::all();

        if ($request->message != null && $request->subject != null) {
            $subject = $request->subject;
            $content = $request->message;

            foreach ($student as $stud) {
                $first_name   = $stud->first_name;
                $email  = $stud->email;

                Mail::send('emails.email', ['content' => $content, 'student' => $first_name], function ($message) use ($subject, $email, $first_name) {
                    $message->to($email, $first_name);
                    $message->subject($subject);
                });
            }
        } else {
            $request->session()->flash('flash.banner', 'A field should not be empty.');
            $request->session()->flash('flash.bannerStyle', 'danger');

            return back()->with('error', 'A field should not be empty.');
        }

        $request->session()->flash('flash.banner', 'Emails sent successfully.');
        $request->session()->flash('flash.bannerStyle', 'success');

        return back();
    }
}
