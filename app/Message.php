<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'subject',
        'body',
        'read',
        'sent',
        'archived'
    ];
}
