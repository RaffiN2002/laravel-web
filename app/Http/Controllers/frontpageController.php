<?php

namespace App\Http\Controllers;

use App\Models\page;
use App\Models\background;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class frontpageController extends Controller
{
    public function index(){
        $about_id = get_meta_value('page_about');
        $about_data = page::where('id',$about_id)->first();

        $experience_data = background::where('type', 'experience')->get();
        $education_data = background::where('type', 'education')->get();
        $project_data = background::where('type', 'project')->orderBy('end', 'desc')->get();

        return view('frontpage.index')->with([
            'about'      => $about_data,
            'experience' => $experience_data,
            'education'  => $education_data,
            'projects'   => $project_data,
        ]);
    }

    public function sendContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:100',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|max:5000',
        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response($validator->errors()->first(), 200);
            }
            return back()->withErrors($validator)->withInput();
        }

        $recipientEmail = get_meta_value('email') ?: config('mail.from.address', 'admin@example.com');

        try {
            Mail::raw(
                "You have received a new contact message from your portfolio website:\n\n" .
                "Name: " . $request->name . "\n" .
                "Email: " . $request->email . "\n" .
                "Subject: " . $request->subject . "\n\n" .
                "Message:\n" . $request->message,
                function ($message) use ($recipientEmail, $request) {
                    $message->to($recipientEmail)
                            ->replyTo($request->email, $request->name)
                            ->subject("[Portfolio Contact] " . $request->subject);
                }
            );

            if ($request->ajax()) {
                return response('OK', 200)->header('Content-Type', 'text/plain');
            }

            return back()->with('success', 'Your message has been sent. Thank you!');
        } catch (\Throwable $e) {
            Log::error('Failed to send contact email: ' . $e->getMessage());

            if ($request->ajax()) {
                return response('Error sending email: ' . $e->getMessage(), 200);
            }

            return back()->with('error', 'Error sending email: ' . $e->getMessage())->withInput();
        }
    }
}
