<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactFormMail;
class ContactController extends Controller
{
    //
    public function store()
    {
        $contact_form = request()->all(); 
        Mail::to('amgadelsousi1996@gmail.com')->send(new contactFormMail($contact_form));
     }
}
