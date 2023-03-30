<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RolesUserApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userRole = [];
        $user = User::find($id);
        $roleUser  = DB::table('model_has_roles')
            ->where('model_id', $id)
            ->get();
        if (count($roleUser) == 0) {
            # code...
            array_push($userRole,array('model_id' => null));
            array_push($userRole , array('role' => null));
        } else {
            array_push($userRole , array('model_id' => $roleUser[0]->model_id));
            $role = Role::find($roleUser[0]->role_id);
            array_push($userRole , array('role' => $role->name));
        }
        array_push($userRole, ['user' => $user]);
       

        //dd($userRole);
    

        return response()->json($userRole);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
