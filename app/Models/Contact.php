<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\SearchTrait;
class Contact extends Model
{
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
    ];
}
