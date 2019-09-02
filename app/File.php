<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';
    protected $primaryKey = 'id';

    protected $fillable = [
    	'name',
    	'description',
    	'price',
        'tipe_game',
        // 'logo_img',
        // 'banner_img',
    	'file',
    ];


    public function tipegames()
    {
        return $this->belongsToMany(TipeGame::class);
    }
}
