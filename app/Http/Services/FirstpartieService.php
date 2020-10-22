<?php


namespace App\Http\Services;

use App\Http\Repository\FirstpartieRepository;
use Illuminate\Http\UploadedFile;

class FirstpartieService
{
    /**
     * @var IMAGE_PATH
     */
    const SIGNATURE_IMAGE_PATH = '/first_signatures';
    /**
     * @var FirstpartieRepository
     */
    private $firstpartieRepository;
    /**
     * @var UploaderService
     */
    private $UploaderService;
    /**
     * __construct
     *
     * @param  FirstpartieRepository $firstpartieRepository
     */
    public function __construct(FirstpartieRepository $firstpartieRepository, UploaderService $UploaderService)
    {
        $this->firstpartieRepository  = $firstpartieRepository;
        $this->UploaderService = $UploaderService;
    }
    /**
     * handle function that make update for firstpartie
     * @param array $request
     * @return Firstpartie
     */
    public function handle($request, $firstpartieId = null)
    {
        $firstpartie = $this->firstpartieRepository;

        if($firstpartieId) {
            $firstpartie = $this->firstpartieRepository->find($firstpartieId);
        }

        $request = array_merge($request,[
          'first_party_joining_date' => date('Y-m-d',strtotime($request['first_party_joining_date']))
        ]);

        if (isset($request['first_party_signature'])) {
          $request = array_merge($request, [
            "first_party_signature"  =>  $this->handleFile($request['first_party_signature'] , self::SIGNATURE_IMAGE_PATH)
          ]);
        }

        if (isset($request['first_party_seal'])) {
          $request = array_merge($request, [
            "first_party_seal"  =>  $this->handleFile($request['first_party_seal'] , self::SIGNATURE_IMAGE_PATH)
          ]);

        }

        $firstpartie->fill($request);

        $firstpartie->save();

    	  return $firstpartie;
    }

    /**
     * handle function that make update for role
     * @param UploadedFile $value
     * @param string $path
     * @return string
     */
    public function handleFile(UploadedFile $value, $path)
    {
      return $this->UploaderService->upload($value, $path);
    }

}
