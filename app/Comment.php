<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    const STORE_RULES = [
        'text' => 'required|min:1|max:1000'
    ];

    protected $guarded = ['id'];

    protected $appends = ['creator'];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatorAttribute()
    {
        return $this->creator()->first();
    }
}
