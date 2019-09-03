<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purchases';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'user_id',
    	'game_id',
    ];
}
