<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendMailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $users = User::all();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new SendMail($user));
        }
    }
}
