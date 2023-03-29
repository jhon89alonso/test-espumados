<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        foreach ($roles as $role) {
            $key = implode(", ", $role->permissions->pluck('name')->toArray());
        }
        //dd($roles,$key);
        return Inertia::render('Roles/Index', compact('roles'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permisos = Permission::all();
        $roles = Role::select('name')->get();
        return Inertia::render('Roles/Create', compact('permisos', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        unset($input['permissions']);
        $role = Role::create($input);
        

        return redirect(route('roles.index'))->with('status', 'El registro de rol fue guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permisos = Permission::all();
        $rol = Role::find($id);
        return Inertia::render('Roles/Edit', compact('permisos','rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::find($id);

        if (empty($role)) {

            return redirect(route('roles.index'))->with('status','Role not found');
        }

        $input= $request->all();

        unset($input['permissions']);
        //dd($input);

        $role->update($input);

        $role->permissions()->detach();

        $role->syncPermissions($request->permissions);

        return redirect(route('roles.index'))->with('status','Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $role = Role::find($id);
       $role->delete($role);

       return redirect()->route('roles.index')->with('status', 'El Rol ha sido eliminado');
    }
}
