<?php
namespace App\Enums;


use Illuminate\Validation\Rules\Enum as RulesEnum;

class MailTemplate extends RulesEnum
{
    const RESET_PASSWORD = 'RESET_PASSWORD_MAILTEMLATE';
    const ACTIVE_ACCOUNT = 'ACTIVE_ACCOUNT_MAILTEMLATE';
}
