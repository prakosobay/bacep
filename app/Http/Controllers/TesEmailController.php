<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\NotifEmail;
use Illuminate\Support\Facades\Mail;

class TesEmailController extends Controller
{
    public function index()
    {

        Mail::to("bayu.prakoso@balitower.co.id")->send(new NotifEmail());

        return "Email telah dikirim";
    }
}
