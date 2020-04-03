<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ApiController;

class ClientController extends ApiController
{

    public function index()
    {
        // Clientes
        $list = Client::get();

        // Clientes con Proyectos
        // $list = Client::with('projects')
        //                     ->get();

        // Clientes con Proyectos (Resumido)
        // $list = DB::select('select clients.id, sum(amount) amount,  sum(payment) payment,   sum(due) due   from clients 
        //                     inner join projects on clients.id = projects.client_id
        //                     group by clients.id ');

        return $this->showAll($list);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
        ];
        $this->validate($request, $rules);

        $data = Client::create($request->all()); 
        return $this->showOne($data,201);
    }

    public function show(Client $client)
    {
        return $this->showOne($client);
    }


    public function update(Request $request, Client $client)
    {

        $client->fill($request->all());

        // isClean (no ha cambiado)     -   isDirty (ha cambiado)
        if ($client->isClean()) {
            return $this->errorResponse('No hay Cambios',422);
        }

        $client->save();
        return $this->showOne($client);
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return $this->showOne($client);
    }



}
