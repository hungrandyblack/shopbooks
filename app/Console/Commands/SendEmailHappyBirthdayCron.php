<?php

namespace App\Console\Commands;

use App\Enums\MailTemplate;
use App\Helpers\PostMan;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Console\Command;

class SendEmailHappyBirthdayCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     *
     * @return int
     */
    public function handle()
    {
        $ngay_hien_tai = date('Y-m-d');
        $mang = explode('-', $ngay_hien_tai);
        $users = User::all();
        foreach ($users as $user) {

            $ngay_sing = explode('-', ($user->birthday));

            if ($ngay_sing[1] == $mang[1] && $ngay_sing[2] == $mang[2]) {
                $user->sendHappyBirthDate();
            }
        }
    }
}
