<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommonMaster extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'common_masters';

    protected $fillable = [
        'common_type',
        'common_code',
        'common_default',
        'display_name',
        'common_string1',
        'common_string2',
        'common_string3',
        'common_num1',
        'common_num2',
        'common_num3',
    ];
}
