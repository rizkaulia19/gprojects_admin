<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\Project;
use App\Models\Role;
use Ramsey\Uuid\Uuid;

// use Ramsey\Uuid\Uuid;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Project::with(['project_applicants'])
            ->get();

        return view('pages.projects.index', [
            'items' => $items
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Project::with(['project_activities', 'project_applicants', 'project_photos', 'project_specializations'])
            ->findOrFail($id);

        return view('pages.projects.detail', [
            'item' => $item
        ]);
    }
}
