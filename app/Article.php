<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;


class Article extends Model
{
//    protected $table = 'article';

    public function tittle()
    {
        return $this->hasMany(User::class);
    }

    protected $fillable = [
        'title', 'image', 'text',
    ];

}
