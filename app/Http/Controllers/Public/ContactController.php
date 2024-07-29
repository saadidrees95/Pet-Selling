<?php

namespace App\Http\Controllers\Public;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    
    // Display a listing of the resource.
    public function index()
    {
        return view('web.page.contact');
    }
    public function send(Request $request)
    {
        // dd($request->all());
        // Redirect with success message after updating profile

        // validate request
        $request->validate([
            'name' => 'required|string|max:160',
            'email' => 'required|email|max:60',
            'mobile' => 'required|digits:11',
            'howFindUs' => 'required|string',
        ]);

        // get data from request
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'howFindUs' => $request->input('howFindUs'),
        ];
        
        // set data for email
        $info = [
                'to_email' => "info@petlodger.co.uk",
                'to_name' => "Admin",
                'from_email' => 'support@petlodger.co.uk',
                'from_name' => 'Petlodger',
            ];

        // Assuming you have a 'contact_us' view for the email
        Mail::send('emails/contact_us', $data, function ($message) use ($info) {
            $message->to($info['to_email'], $info['to_name']);
            $message->from($info['from_email'], $info['from_name']);
            $message->subject('Petlodger - Contact Us Form');
        });

          // You might want to flash a success message or redirect to a thank you page
          return redirect()->back()->with('success', 'Thank you for reaching out. We will get back to you soon!');
        //   return redirect()->route('contact')->with('success', 'Thank you for reaching out. We will get back to you soon!');
    }
}
