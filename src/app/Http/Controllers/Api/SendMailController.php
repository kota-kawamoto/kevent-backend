<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendMailController extends Controller
{
    public function sendEmail(Request $request)
    {
        try {
            $toAddress = 'krt34kk0@gmail.com';

            Mail::raw('テストメールの送信です。', function ($message) use ($toAddress) {
                $message->to($toAddress)
                        ->subject('テストメールの送信');
            });
        } catch (\Exception $e) {
            Log::error('メール送信に失敗しました：' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
