<?php

namespace TelusApp;

use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
