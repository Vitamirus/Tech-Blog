<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopMenu extends Model
{
    public function tittle()
    {
        return $this->hasMany(TopMenu::class);
    }

    public function childrenTittle()
    {
        return $this->hasMany(TopMenu::class)->with('tittle');
    }
}
