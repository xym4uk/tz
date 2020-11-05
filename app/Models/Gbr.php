<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gbr extends Model {



    protected $fillable = [
        'Group_id',
        'TableID',
        'Description',
        'category',
        'status_id',
        'reason',
    ];
}
