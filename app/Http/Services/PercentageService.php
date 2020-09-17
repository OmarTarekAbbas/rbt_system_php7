<?php


namespace App\Http\Services;

use App\Http\Repository\PercentageRepository;

class PercentageService
{
    /**
     * @var PercentageRepository
     */
    private $percentageRepository;

    /**
     * __construct
     *
     * @param  PercentageRepository $percentageRepository
     */
    public function __construct(PercentageRepository $percentageRepository)
    {
        $this->percentageRepository  = $percentageRepository;
    }
    /**
     * handle function that make update for percentage
     * @param array $request
     * @return Percentage
     */
    public function handle($request, $percentageId = null)
    {
        $percentage = $this->percentageRepository;

        if($percentageId) {
            $percentage = $this->percentageRepository->find($percentageId);
        }

        $percentage->fill($request);

        $percentage->save();

    	return $percentage;
    }

}
