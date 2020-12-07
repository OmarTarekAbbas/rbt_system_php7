<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Services\ClientAuthService;
use App\Http\Requests\ClientLoginRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateUserImageRequest;

class ClientController extends Controller
{
  /**
   * ClientAuthService
   * @var ClientAuthService
   */
  private $clientAuthService;

  /**
   * Method __construct
   *
   * @param ClientAuthService $clientAuthService
   */
  public function __construct(ClientAuthService $clientAuthService)
  {
    $this->clientAuthService = $clientAuthService;
  }
  /**
   * Method getLoginPage
   *
   * @return View
   */
  public function getLoginPage()
  {
    return view('client.auth.login');
  }

  /**
   * Method Login
   *
   * @param ClientLoginRequest $request
   *
   * @return void
   */
  public function Login(ClientLoginRequest $request)
  {
    if ($this->clientAuthService->attempt($request->validated())) {
      return redirect('client/contracts');
    }
    return back()->with('faild','These credentials do not match our records');
  }

  /**
   * Method getProfilePage
   *
   * @return View
   */
  public function getProfilePage()
  {
    $user = session()->get('client');
    return view('client.auth.profile',compact('user'));
  }

  /**
   * Method updateprofilepic
   *
   * @param UpdateUserImageRequest $request
   *
   * @return Resirect
   */
  public function updateprofilepic(UpdateUserImageRequest $request)
  {
    $user = session()->get('client');
    $this->clientAuthService->updateImage($request->validated(), $user);
    return back()->with('success', 'Update User Image');
  }

  /**
   * Method updatepassword
   *
   * @param UpdatePasswordRequest $request
   *
   * @return void
   */
  public function updatepassword(UpdatePasswordRequest $request)
  {
    $user = session()->get('client');
    $this->clientAuthService->updatePassword($request->validated(), $user);
    return back()->with('success', 'Update User Password');
  }

  public function Logout()
  {
    session()->forget('client');
    return redirect('client/login');
  }
}
