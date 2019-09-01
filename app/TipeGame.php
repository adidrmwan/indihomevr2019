<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipeGame extends Model
{
    protected $table = 'tipe_games';
    protected $primaryKey = 'id';
    public $incrementing = true;
    
    protected $fillable = [
    	'id', 'nama', 'deskripsi'
    ];
    
    public function tipes()
    {
        return $this
            ->belongsToMany('App\File')
            ->withTimestamps();
    }
}
