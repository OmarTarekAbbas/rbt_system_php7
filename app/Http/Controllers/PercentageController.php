<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Repository\PercentageRepository;
use App\Http\Requests\PercentageRequest;
use App\Http\Services\PercentageService;

class PercentageController extends Controller
{
    /**
     * PercentageRepository
     *
     * @var PercentageRepository
     */
    private $percentageRepository;
    /**
     * PercentageService
     *
     * @var PercentageService
     */
    private $percentageService;
    /**
     * __construct
     *
     * @param  PercentageRepository $percentageRepository
     * @param  PercentageService $percentageService
     */


    public function __construct(
        PercentageRepository $percentageRepository,
        PercentageService $percentageService
    )
    {
      $this->get_privilege();
        $this->percentageRepository = $percentageRepository;
        $this->percentageService = $percentageService;
    }

    /**
     * index
     * get all Percentage data
     * @return View
     */
    public function index()
    {
        $percentages = $this->percentageRepository->get();
        return view('percentage.index',compact('percentages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  View
     */
    public function create()
    {
        return view('Percentage.create');
    }

    /**
     * store Percentage data
     *
     * @param  PercentageRequest $request
     * @return Redirect
     */
    public function store(PercentageRequest $request)
    {
        $this->percentageService->handle($request->validated());

        $request->session()->flash('success', 'Percentage created successfull');

        return redirect('percentages');
    }

    /**
     * Show the form for editing the specified resource.
     * @param    int  $id
     * @return  View
     */
    public function edit($id)
    {
        $percentage = $this->percentageRepository->findOrfail($id);

        return view('Percentage.edit',compact('percentage'));
    }

    /**
     * update
     *
     * @param  int $id
     * @param  PercentageUpdateRequest $request
     * @return Redirect
     */
    public function update($id, PercentageRequest $request)
    {

        $this->percentageService->handle($request->validated(), $id);

        $request->session()->flash('success', 'updated successfully');

        return redirect('percentages');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Percentage = $this->percentageRepository->findOrfail($id);

        $Percentage->delete();

        \Session::flash('success', 'deleted successfully');

        return back();
    }
}
