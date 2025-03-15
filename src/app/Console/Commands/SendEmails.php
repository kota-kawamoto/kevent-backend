<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sendEmails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'メールを配信する';

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
        $send_email_controller = app()->make('App\Http\Controllers\Api\SendMailController');
        $request = new Request();
        $send_email_controller->sendEmail($request);

        return Command::SUCCESS;
    }
}
