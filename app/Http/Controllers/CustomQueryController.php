<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CustomQueryController extends ApiController
{

    public function clients_projects()
    {
        //Clientes con Proyectos
        $list = Client::with('projects')->get();
        return $this->showFree($list);
    }


    public function clients_projects_show($client_id)
    {
        //Clientes con Proyectos
        $list = Client::where('id',$client_id)->with('projects')->get();
        return $this->showFree($list);
    }


}
