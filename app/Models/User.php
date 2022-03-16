<?php

namespace App\Models;

use App\Helpers\PostMan;
use App\Enums\MailTemplate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\URL;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
class User extends Authenticatable
{
    use SoftDeletes;
    use HasFactory;
    protected $table    ="users";
    protected $fillable = ['id','name','role','email','phone','gender','address','birthday','password'];
    public $timestamps  = false;
    public function full_name()
    {
        return 'Lê Quốc Hưng';
    }
    private function generateResetPassworkToken()
    {
        $token = Str::random(64);
        //create a new token to be sent to the user.
        $ret = DB::table('password_resets')->updateOrInsert(
            ['email' => $this->email],
            [
                'email' => $this->email,
                'token' => $token,
                'created_at' => \Illuminate\Support\Carbon::now()
            ]
        );
        if (!isset($ret)) return null;
        return $token;
    }

    public function generateAndSendEmailResetPassword()
    {
        $token = $this->generateResetPassworkToken();
        if (!isset($token)) return false;
        $message = [
            'to' => $this->email,
            'to_name' => $this->full_name(),
            'subject' => null
        ];
        $timeout = config('auth.passwords.users.expire', 60);
        // set timeout for link - 60 minutes
        $link = Url::temporarySignedRoute('password.reset', now()->addMinutes($timeout), ['token' => $token]);
        $data = [
            'link_reset' => $link
        ];
        return PostMan::sendEmailUsingMaster('email.fogot_password', $message, MailTemplate::RESET_PASSWORD, $data);
    }
}
