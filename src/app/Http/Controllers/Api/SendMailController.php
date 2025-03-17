<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Carbon\Carbon;

class SendMailController extends Controller
{
    public function sendEmail(Request $request)
    {
        try {
            $toAddress = 'krt34kk0@gmail.com';

            // ユーザー数の取得
            $totalUsers = User::count();
            $todayUsers = User::whereDate('created_at', Carbon::today())->count();

            // メール本文の作成
            $mailBody = "以下、ユーザー統計情報\n\n";
            $mailBody .= "総ユーザー数: {$totalUsers}名\n";
            $mailBody .= "本日の新規ユーザー: {$todayUsers}名\n";
            $mailBody .= "\n送信日時: " . Carbon::now()->format('Y年m月d日 H:i:s');

            Mail::raw($mailBody, function ($message) use ($toAddress) {
                $message->to($toAddress)
                        ->subject('ユーザー数レポート - ' . Carbon::now()->format('Y/m/d'));
            });

        } catch (\Exception $e) {
            Log::error('メール送信に失敗しました：' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
