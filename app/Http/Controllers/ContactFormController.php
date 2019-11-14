<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create()
    {
        return view ('pages.index');
    }

    public function store()
    {
        $data = request()->validate([
        'name' => 'required',
        'email' => 'required|email',
        'YourMessage' => 'required',
        ]);

        Mail::to('adeyinkaadedeji07@gmail.com')->send(new ContactFormMail($data));

        return redirect('/')->with('message', 'Thanks for your message. We\'ll be in touch.');

    }
}
