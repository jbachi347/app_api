<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ProjectController extends ApiController
{

    public function index()
    {
        $list = Project::all();
        return $this->showAll($list);
    }

    public function store(Request $request)
    {

        $rules = [
            'client_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'amount' => 'required|integer|min:1',
        ];

        $this->validate($request, $rules);

        $data = Project::create($request->all()); 
        return $this->showOne($data,201);
    }

    public function show(Project $project)
    {
        return $this->showOne($project);
    }

    public function update(Request $request, Project $project)
    {
        $project->fill($request->all());

        // isClean (no ha cambiado)     -   isDirty (ha cambiado)
        if ($project->isClean()) {
            return $this->errorResponse('No hay Cambios',422);
        }

        $project->save();
        return $this->showOne($project);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return $this->showOne($project);
    }
}
