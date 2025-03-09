<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\{Permission, Role};
use Illuminate\Http\Request;

use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class RoleController extends Controller implements HasMiddleware
{

    public static function middleware()
    {
        return [
            'auth',
            'role_or_permission:Admin|create-role|edit-role|delete-role'
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.roles.index', [
            'roles' => Role::with('permissions')
            ->orderBy('id', 'DESC')
            ->paginate(3), 'title' => "All Roles"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create', ['permissions'=>Permission::get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        if ($role->name == "Super Admin") {
            abort (403, 'Super Admin role can not be  edited');

        $rolePermissions = \DB::table('role_has_permissions')->where('role_id', $role->id)->pluck('permission_id')->all();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        if ($role->name == "Super Admin") {
            abort (403, 'Super Admin role can not be  deleted');
        }

        if(auth()->user()->hasRole($role->name)) {
            abort(403, 'Can not delete self assigmed role.');
        }

        $role->delete();
    }
}
