<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Mail\TestMail;

class MailSend extends Controller
{
    public function mailsend()
    {
        $details = [
            'title' => 'Title: Mail from Classroom Finder',
            'body' => 'Body: This is for testing email using smtp'
        ];

        \Mail::to('geraldevreuxx@gmail.com')->send(new TestMail($details));
        return view('userAccount')->with('success', 'Email sent successfully');
    }
}
