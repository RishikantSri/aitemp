<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;


class ContactController extends Controller
{

    public function storeContactForm(Request $request)
    {
        // dd('testing..');
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
            'file' => 'required|mimes:pdf,doc,docx|max:2048', // Validate file types and size

        ]);


        if (!$validator->passes()) {

            return response()->json(['error' => $validator->errors()->all()]);
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time().'_'.$file->getClientOriginalName();
            $path = $file->storeAs('uploads', $filename);
            // Store file path in the database or perform other actions
        }

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->attachement = $request->hasFile('file') ? $path :  'default.jpeg';
        $contact->save();


        // sending email

        // $to = "support@rishikantsri.in";
        // $subject = "Admin: You Received New Contact Form's Query";

        // $message = "<b>This is HTML message.</b>";
        // $message .= "<h1>This is headline.</h1>";

        // $header = "From:support@rishikantsri.in \r\n";
        // $header .= "Cc:support@rishikantsri.in \r\n";
        // $header .= "MIME-Version: 1.0\r\n";
        // $header .= "Content-type: text/html\r\n";

        // $retval = mail($to, $subject, $message, $header);

        // if ($retval == true) {
        //     Log::info('This is an informational message for debugging purposes.');
        //     return response()->json(['success' => $retval . 'Your message has been sent. We will contact you asap. Thank you!']);
        // } else {
        //     return response()->json(['error' => 'Please try after some time']);
        // }


        $to = "support@rishikantsri.in";
        $subject = "Admin: You Received New Contact Form's Query";
        $message = "<b>This is HTML message.</b><h1>This is headline.</h1>";
        $headers = "From: support@rishikantsri.in\r\n";
        $headers .= "Cc: support@rishikantsri.in\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html\r\n";

  

           if (mail($to, $subject, $message, $headers)) {
            Log::info('This is an informational message for debugging purposes.');

            return response()->json(['success' =>  'Your message has been sent. We will contact you asap. Thank you!' . $contact->attachement ]);
        } else {
            return response()->json(['error' => 'Please try after some time']);
        }
    }
}
