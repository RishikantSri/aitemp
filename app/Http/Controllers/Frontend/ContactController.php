<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        ]);


        if (!$validator->passes()) {

            return response()->json(['error' => $validator->errors()->all()]);
        }

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->attachement = $input['attachement'] ?? 'default.jpeg';
        $contact->save();


        // sending email

        $to = "xyz@somedomain.com";
        $subject = "Admin: You Received New Contact Form's Query";

        $message = "<b>This is HTML message.</b>";
        $message .= "<h1>This is headline.</h1>";

        $header = "From:abc@somedomain.com \r\n";
        $header .= "Cc:afgh@somedomain.com \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";

        $retval = mail($to, $subject, $message, $header);

        if ($retval == true) {
            return response()->json(['success' => 'Your message has been sent. We will contact you asap. Thank you!']);
        } else {
            return response()->json(['error' => 'Please try after some time']);
        }
    }
}
