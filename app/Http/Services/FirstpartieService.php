<?php


namespace App\Http\Services;

use App\Http\Repository\FirstpartieRepository;

class FirstpartieService
{
    /**
     * @var FirstpartieRepository
     */
    private $firstpartieRepository;

    /**
     * __construct
     *
     * @param  FirstpartieRepository $firstpartieRepository
     */
    public function __construct(FirstpartieRepository $firstpartieRepository)
    {
        $this->firstpartieRepository  = $firstpartieRepository;
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
        
        $firstpartie->fill($request);

        $firstpartie->save();

    	return $firstpartie;
    }

}
