<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Role;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    private $role;
    public function __construct(Role $role)
    {
        $this->role = $role;
    }
    public function index()
    {
        $roles = $this->role->latest()->paginate(5);
        return view('admin.role.index', compact('roles'));
    }
    public function create()
    {
        return view('admin.role.create');
    }
    public function store(CreateRoleRequest $request)
    {
        $this->role->create([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);
        return redirect()->back();
    }
    public function edit($id)
    {
        $roles = $this->role->find($id);
        return view('admin.role.edit', compact('roles'));
    }
    public function update(UpdateRoleRequest $request, $id)
    {
        $this->role->find($id)->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);
        return redirect()->back();
    }
}
