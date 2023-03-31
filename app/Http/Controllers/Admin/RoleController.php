<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Repositories\RoleRepository\RoleRepositoryInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    public $repository;
    public $permissions;
    public $users;

    public function __construct(RoleRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->permissions = Permission::all();
        $this->users = User::all();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->repository->all();
        $permissions = $this->permissions;

        return view('admin.roles.index', compact('roles', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = $this->permissions;
        $users = $this->users;
        return view('admin.roles.create', compact('permissions', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $this->repository->store($request->all());
        Alert::success('', 'عملیات با موفقیت انجام شد');
        return redirect(route('role.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param model Role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param model Role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = $this->permissions;
        $users = $this->users;
        return view('admin.roles.edit', compact('role', 'permissions', 'users'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param model Role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        $this->repository->update($role, $request->all());
        Alert::success('', 'عملیات با موفقیت انجام شد');
        return redirect(route('role.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param model Role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->repository->delete($role);
        Alert::success('', 'عملیات با موفقیت انجام شد');
        return redirect(route('role.index'));

    }
}
