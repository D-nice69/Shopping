<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminRoleController extends Controller
{
    private $role;
    private $permission;
    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }
    public function index()
    {
        $roles = $this->role->latest()->paginate(5);
        return view('admin.role.index', compact('roles'));
    }
    public function create()
    {
        $permissionParent = $this->permission->where('parent_id', 0)->get();
        return view('admin.role.create', compact('permissionParent'));
    }
    public function store(CreateRoleRequest $request)
    {
        $role = $this->role->create([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);
        $role->permissions()->attach($request->permission_id);
        return redirect()->back();
    }
    public function edit($id)
    {
        $roles = $this->role->find($id);
        $permissionParent = $this->permission->where('parent_id', 0)->get();
        $permissionChecked = $roles->permissions;
        return view('admin.role.edit', compact('roles', 'permissionParent', 'permissionChecked'));
    }
    public function update(UpdateRoleRequest $request, $id)
    {
        $this->role->find($id)->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);
        $this->role->find($id)->permissions()->sync($request->permission_id);
        return redirect()->back();
    }
    public function delete($id)
    {
        try {
            $this->role->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        } catch (\Exception $exception) {
        }
    }
}
