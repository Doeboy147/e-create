<?php

namespace App\Models;

use Laravel5Helpers\Uuid\UuidModel;

class Threshold extends UuidModel
{
    protected $table = 'alerts';

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'uuid', 'user_id');
    }
}
