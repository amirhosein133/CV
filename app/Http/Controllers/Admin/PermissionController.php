<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Repositories\PermissionRepository\PermissionRepositoryInterface;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PermissionController extends Controller
{
    public $repository;
    public $roles;

    public function __construct(PermissionRepositoryInterface $repository)
    {
        $this->roles = Role::all();
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = $this->repository->all();
        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->roles;
        return view('admin.permissions.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionRequest $request)
    {
        $this->repository->store($request->all());
        Alert::success('', 'عملیات با موفقیت انجام شد');
        return redirect(route('permission.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $roles = $this->roles;
        return view('admin.permissions.edit', compact('permission', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, Permission $permission)
    {
        $this->repository->update($permission, $request->all());
        Alert::success('', 'عملیات با موفقیت انجام شد');
        return redirect(route('permission.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $this->repository->destroy($permission);
        Alert::success('', 'عملیات با موفقیت انجام شد');
        return redirect(route('permission.index'));
    }
}
