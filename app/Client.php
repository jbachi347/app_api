<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    protected $fillable = ['name','contact','description'];

    public function projects()
    {
        return $this->hasMany('App\Project', 'client_id');
    }

    // PERSONAL FUNCTION
    public function saldos()
    {
        $result = DB::select('select sum(amount) amount, sum(payment) payment,  sum(due) due  from projects where client_id = ? ', [$this->id]);
        return $result;     
    }

}
