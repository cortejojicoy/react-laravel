<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use \Pusher\Pusher;
use App\Mail\SendMail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function video_call()
    {
        return view('video');
    }

    public function video_call3()
    {
      return view('video3');
    }

    public function email_page()
    {
        return view('email');
    }

    public function text_message()
    {
        return view('textmessage');
    }

    public function sendEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'subject' => 'required',
            'content' => 'required',
        ]);

        $myMail = new SendMail(
            $request->input('subject'),
            $request->input('content')
        );

        Mail::to($request->input('email'))->send($myMail);
        return redirect()->back()->with('success', 'Email sent successfully. to :'. $request->input('email'));
    }

    public function authenticate(Request $request) {
        $socketId = $request->socket_id;
        $channelName = $request->channel_name;

        $pusher = new Pusher('9b202a5c8e3115ae0dcf', '053ea8167a1990e5fb9f', '1032375', [
            'cluster' => 'ap2',
            'encrypted' => true
        ]);

        $presence_data = ['name' => auth()->user()->name];
        $key = $pusher->presence_auth($channelName, $socketId, auth()->id(), $presence_data);

        return response($key);
    }
}
