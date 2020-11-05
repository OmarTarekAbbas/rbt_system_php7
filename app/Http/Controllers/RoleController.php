<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Repository\RoleRepository;
use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Http\Services\RoleService;
use Spatie\Permission\Models\Role;
use App\Models\RouteModel ;

class RoleController extends Controller
{
    /**
     * roleRepository
     *
     * @var RoleRepository
     */
    private $roleRepository;
    /**
     * roleService
     *
     * @var RoleService
     */
    private $roleService;

    /**
     * __construct
     * inject needed data in constructor
     * @param  RoleRepository $roleRepository
     * @param  RoleService $roleService
     * @return void
     */
    public function __construct(RoleService $roleService, RoleRepository $roleRepository)
    {
      $this->get_privilege();
      $this->roleRepository    = $roleRepository;
        $this->roleService  = $roleService;

    }

    /**
     * index
     * indexes all roles in view
     * @return View
     */
    public function index()
    {
        $roles = $this->roleRepository->all();

        return view('roles.index', compact('roles'));
    }


    /**
     * create
     * return page for create
     * @return View
     */
    public function create()
    {
           return view('roles.create');
    }


    /**
     * store
     *
     * @param  RoleRequest $request
     * @return Redirect
     */
    public function store(RoleStoreRequest $request)
    {
        $this->roleService->handle($request->validated());

        \Session::flash('success','Role added successfully');

        return redirect('roles');

    }

    /**
     * edit
     *
     * @param  Integer $id
     * @return View
     */
    public function edit($id)
    {
        $role = $this->roleRepository->find($id);

        return view('roles.edit', compact('role'));
    }


    /**
     * update
     *
     * @param  RoleUpdateRequest $request
     * @return Redirect
     */
    public function update(RoleUpdateRequest $request)
    {

        $this->roleService->handle($request->validated(), $request->role_id);

        \Session::flash('success','Role Updated successfully');

        return redirect('roles');

    }


    /**
     * destroy
     *
     * @param  Integer $id
     * @return void
     */
    public function destroy($id)
    {
        $role = $this->roleRepository->findOrfail($id);

        $role->delete();

        \Session::flash('success','Role Deleted successfully');

        return redirect('roles');
    }

    public function view_access($id)
    {
        $controllers = $this->get_controllers() ; // in main controller
        $routes = RouteModel::all() ;
        $role = Role::findOrFail($id) ;
        $query = "SELECT * FROM routes JOIN role_route ON routes.id = role_route.route_id JOIN roles ON role_route.role_id = roles.id WHERE roles.id = $id ORDER BY routes.controller_name" ; // order by here to sort them as the file system sorting
        $methods = \DB::select($query) ;
        return view('roles.access',compact('role','routes','controllers','methods')) ;
    }


}
















