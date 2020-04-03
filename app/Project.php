<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
        protected $table = 'projects';
        protected $fillable = ['client_id','name','description','amount','payment','due'];

        public function client()
        {
            return $this->belongsTo('App\Client', 'client_id');
        }
        
}
