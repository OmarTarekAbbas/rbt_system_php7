<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Repository\RoleRepository;
use App\Http\Repository\UserRepository;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateUserImageRequest;
use App\Http\Requests\UserProfileRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Services\UserStoreService;
use App\Http\Services\UserUpdateService;

class UserController extends Controller
{
    /**
     * userRepository
     *
     * @var UserRepository
     */
    private $userRepository;
    /**
     * roleRepository
     *
     * @var RoleRepository
     */
    private $roleRepository;
    /**
     * userStoreService
     *
     * @var UserStoreService
     */
    private $userStoreService;
    /**
     * userUpdateService
     *
     * @var UserUpdateService
     */
    private $userUpdateService;

    /**
     * __construct
     *
     * inject needed data in constructor
     *
     * @param  UserRepository $userRepository
     * @param  RoleRepository $roleRepository
     * @param  UserStoreService $userStoreService
     * @return void
     */
    public function __construct(UserStoreService $userStoreService, UserUpdateService $userUpdateService, UserRepository $userRepository, RoleRepository $roleRepository)
    {
        $this->userRepository    = $userRepository;
        $this->roleRepository    = $roleRepository;
        $this->userStoreService  = $userStoreService;
        $this->userUpdateService = $userUpdateService;
    }

    /**
     * index
     * Get All Users Data
     * @return View
     */
    public function index()
    {
        $users = $this->userRepository->with('roles')
                ->where('email','!=',auth()->user()->email)
                ->get();

        return view('users.index', compact('users'));
    }

    /**
     * create
     * get Create User Page
     * @return View
     */
    public function create()
    {
        $roles = $this->roleRepository->all();
        return view('users.create',compact('roles'));
    }

    /**
     * store
     *
     * @param  UserStoreRequest $request
     * @return Redirect
     */
    public function store(UserStoreRequest $request)
    {

        $user = $this->userStoreService->handle($request->validated());

        $request->session()->flash('success','User Added Successfully');

        return redirect('users');
    }

    /**
     * edit
     * edit user
     * @param  Integer $id
     * @return View
     */
    public function edit($id)
    {
        $user = $this->userRepository->findOrfail($id);

        $roles = $this->roleRepository->all();

        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * update
     *
     * @param  Integer $id
     * @param  UserUpdateRequest $request
     * @return void
     */
    public function update($id, UserUpdateRequest $request)
    {
        $user = $this->userRepository->findOrfail($id);

        $this->userUpdateService->handle($request->validated(), $user);

        \Session::flash('success','User updated successfully');

        return redirect('users');
    }

    /**
     * destroy
     *
     * @param  Integer $id
     * @return Redirect
     */
    public function destroy($id)
    {
        if (!auth()->user()->hasRole('super_admin', 'ceo')) {
            return back()->with('status',"you didn't have this role");
        }

        $user = $this->userRepository->findOrfail($id);

        $user->delete();

        \Session::flash('success','User has been deleted successfully');

        return redirect('users');
    }

    /**
     * profile
     * return view for user profile
     * @return View
     */
    public function profile()
    {
        $user = auth()->user();
        return view('userprofile.profile',compact('user'));
    }

    /**
     * UpdatePassword
     *
     * @param  UpdatePasswordRequest $request
     * @return Redirect
     */
    public function UpdatePassword(UpdatePasswordRequest $request)
    {
        $this->userUpdateService->handle($request->validated(), auth()->user());
        \Session::flash('success','Password updated successfully');
        return redirect('user_profile');
    }

    /**
     * UpdateProfilePicture
     * Update Auth User Image
     * @param  UpdateUserImageRequest $request
     * @return Redirect
     */
    public function UpdateProfilePicture(UpdateUserImageRequest $request)
    {
        $this->userUpdateService->handle($request->validated(), auth()->user());
        \Session::flash('success','Profile picture updated');
        return redirect('user_profile');
    }

    /**
     * UpdateNameAndEmail
     * Update User Pofile Name And Email
     * @param  UserProfileRequest $request
     * @return Redirect
     */
    public function UpdateNameAndEmail(UserProfileRequest $request)
    {
        $this->userUpdateService->handle($request->validated(), auth()->user());
        $request->session()->flash('success','Updated Successfully');
        return redirect('user_profile');
    }

}
