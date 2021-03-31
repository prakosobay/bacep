<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Panggil SendMail yang telah dibuat
use App\Mail\NewMail;
// Panggil support email dari Laravel
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index()
    {
        $nama = "Ubay";
        $email = "bayu230498@gmail.com";
        $kirim = Mail::to($email)->send(new NewMail($nama));
        if ($kirim) {
            echo "Email telah dikirim";
        }
    }
}
