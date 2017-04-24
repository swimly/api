<?php

namespace App\Http\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use Notifiable;
    protected $fillable = [
        'title', 'author','cover','content','md','views','content','time','tag'
    ];
    protected $table = 'articles';
    public $timestamps = false;
}
