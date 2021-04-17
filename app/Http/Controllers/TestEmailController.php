<?php

namespace App\Http\Controllers;

use App\Mail\MailTemp1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TestEmailController extends Controller
{
    public function send()
    {
        Mail::to("bayu.prakoso@balitower.co.id")->send(new MailTemp1());

        return "Email telah dikirim";
    }
}
