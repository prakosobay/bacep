<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\NotifEmail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\CleaningController;

class TesEmailController extends Controller
{
    public function index()
    {

        // Mail::to("bayu.prakoso@balitower.co.id")->send(new NotifEmail());

        // return "Email telah dikirim";

        foreach (['bayu230498@gmail.com', 'bayu.prakoso@balitower.co.id'] as $recipient) {
            Mail::to($recipient)->send(new NotifEmail());
        }
        return "Email telah dikirim";
    }
}
