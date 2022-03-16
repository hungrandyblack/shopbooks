<?php

namespace App\Helpers;

use App\Models\CommonMaster;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Exception;

class PostMan
{

    private static function compose($common_code, $input_array)
    {
        if (!isset($common_code))
            return ['subject' => null, 'content' => null];

        $emailTemplate = CommonMaster::where('common_code', '=',$common_code)->first();
     
        if (!isset($emailTemplate))

            return ['subject' => null, 'content' => null];

        $template =  $emailTemplate->common_string2;

        foreach ($input_array as $key => $value) {

            $template = str_replace('${' . $key . '}', $value, $template);
        }
    
        return ['subject' => $emailTemplate->common_string1, 'content' => $template];
    }

    /**
     * @param $view
     * @param $message ['to', 'to_name', 'content', 'subject']
     * @param $mail_master_code
     * @param $data
     * @return bool
     */
    public static function sendEmailUsingMaster($view, $message, $mail_master_code = null, $data = [])
    {

        if (!isset($message->content)) {
            $msg = PostMan::compose($mail_master_code, $data);
            $message['subject'] = $message['subject'] ?? $msg['subject'];
            $message['content'] = $msg['content'];
            $message['use_bcc'] = 'lequochung2001@gmail.com';
            $message['cc'] = 'nhatlemanhe339@gmail.com';
        }

        if (!isset($message['content']))
            return false;
        try {
            self::sendEmail($view, $message['to'], $message['to_name'], $message['subject'], nl2br($message['content']), $message['use_bcc'] ?? false, $message['cc'] ?? [], $message['to_name']);
            return true;
        } catch (Exception $ex) {
            logger()->error($ex);
            return false;
        }
    }

    /**
     * send email
     *
     * @param  string $view mail-content
     * @param  string $to 
     * @param  string $to_name
     * @param  string $subject
     * @param  string $html
     * @param  bool $use_bcc
     * @return void
     */
    public static function sendEmail($view, $to, $to_name, $subject, $html, $use_bcc, $cc, $name)
    {
        Mail::send($view, ['html' => $html, 'name' => $name], function ($m) use ($to, $to_name, $subject, $use_bcc, $cc, $name) {
            $m->to($to, $to_name)->bcc($use_bcc)->cc($cc)->subject($subject);
        });
    }
}
