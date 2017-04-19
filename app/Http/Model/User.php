<?php

namespace App\Http\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use Notifiable;
    protected $fillable = [
        'email', 'password','name','sex','face','homeplace','residence','info','position','department'
    ];
    protected $table = 'users';
    public $timestamps = false;
}
