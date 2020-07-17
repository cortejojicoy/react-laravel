<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\SendMail;

class SendEmailController extends Controller
{
	public function sendEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'subject' => 'required',
            'content' => 'required',
        ]);

        $myMail = new SendMail(
            $this->input('subject'),
            $this->input('content')
        );

        Mail::to($request->input('email'))->send($myMail);
        return redirect()->back()->with('success', 'Email sent successfully. to :'. $request->input(email));
    }

}
