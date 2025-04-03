<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class DailyUserCount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:DailyUserCount';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '日次でユーザ数の増減を集計しメールを配信する';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
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
            return self::FAILURE;
        }

        return self::SUCCESS;
    }
}
