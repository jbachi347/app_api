<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
        protected $table = 'projects';
        protected $casts = [ 
                'amount' => 'double',
                'payment' => 'double',
                'due' => 'double',
                'client_id' => 'integer' ];
        protected $fillable = ['client_id','name','description','amount','payment','due'];

        public function client()
        {
            return $this->belongsTo('App\Client', 'client_id');
        }
        
}
