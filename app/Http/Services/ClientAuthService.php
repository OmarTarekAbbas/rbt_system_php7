<?php

namespace App\Http\Services;

use App\Http\Repository\SecondPartyRepository;
use App\SecondParties;
use Illuminate\Http\UploadedFile;

class ClientAuthService
{
  /**
   * @var IMAGE_PATH
   */
  const IMAGE_PATH = '/second_party';
  /**
   * SecondPartyRepository
   * @var SecondPartyRepository
   */
  private $secondPartyRepository;

  /**
   * Method __construct
   *
   * @param SecondPartyRepository $secondPartyRepository
   * @param UploaderService $uploaderService
   */
  public function __construct(SecondPartyRepository $secondPartyRepository, UploaderService $uploaderService)
  {
    $this->secondPartyRepository = $secondPartyRepository;
    $this->uploaderService       = $uploaderService;
  }
  /**
   * Method attempt
   *
   * @param Array $request
   *
   * @return void
   */
  public function attempt($request)
  {
    $user = $this->secondPartyRepository->where('email',$request['email'])->first();
    if($user) {
      if(\Hash::check($request['password'], $user->password)){
        session(['client' => $user]);
        return true;
      }
      return false;
    }
    return false;
  }

  /**
   * Method updateImage
   *
   * @param Array $request
   * @param SecondParties $user
   * @return void
   */
  public function updateImage($request, SecondParties $user)
  {
    $this->secondPartyRepository->where('email',$user->email)->update([
      'image' => $this->handleFile($request['image'] ,self::IMAGE_PATH)
    ]);
    $this->updateClientSessionInfo($user);
  }

  /**
   * Method updatePassword
   *
   * @param Array $request
   * @param SecondParties $user [explicite description]
   *
   * @return void
   */
  public function updatePassword($request, SecondParties $user)
  {
    $this->secondPartyRepository->where('email',$user->email)->update([
      'password' => \Hash::make($request['password'])
    ]);
    $this->updateClientSessionInfo($user);
  }

  /**
   * Method updateClientSessionInfo
   *
   * @param SecondParties $user
   *
   * @return void
   */
  public function updateClientSessionInfo(SecondParties $user)
  {
    $user = $this->secondPartyRepository->where('email',$user->email)->first();
    session(['client' => $user]);
  }

  /**
   * handle function that make update for role
   * @param UploadedFile $value
   * @param string $path
   * @return string
   */
  public function handleFile(UploadedFile $value, $path)
  {
    return $this->uploaderService->upload($value, $path);
  }
}
