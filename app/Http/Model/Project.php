<?php

namespace App\Http\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use Notifiable;
    protected $fillable = [
        'catory', 'title','author','cover','github','preview','views','content','time','tag','join'
    ];
    protected $table = 'projects';
    public $timestamps = false;
}
