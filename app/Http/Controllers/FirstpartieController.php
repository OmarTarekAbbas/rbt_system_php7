<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Repository\FirstpartieRepository;
use App\Http\Requests\FirstpartieRequest;
use App\Http\Services\FirstpartieService;

class FirstpartieController extends Controller
{
    /**
     * FirstpartieRepository
     *
     * @var FirstpartieRepository
     */
    private $firstpartieRepository;
    /**
     * FirstpartieService
     *
     * @var FirstpartieService
     */
    private $firstpartieService;
    /**
     * __construct
     *
     * @param  FirstpartieRepository $firstpartieRepository
     * @param  FirstpartieService $firstpartieService
     */

    public function __construct(
        FirstpartieRepository $firstpartieRepository,
        FirstpartieService $firstpartieService
    )
    {
      $this->get_privilege();
        $this->firstpartieRepository = $firstpartieRepository;
        $this->firstpartieService = $firstpartieService;
    }

    /**
     * index
     * get all Firstpartie data
     * @return View
     */
    public function index()
    {
        $firstparties = $this->firstpartieRepository->get();
        return view('first_partie.index',compact('firstparties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  View
     */
    public function create()
    {
        return view('first_partie.create');
    }

    /**
     * store Firstpartie data
     *
     * @param  FirstpartieRequest $request
     * @return Redirect
     */
    public function store(FirstpartieRequest $request)
    {
        $this->firstpartieService->handle($request->validated());

        $request->session()->flash('success', 'Firstpartie created successfull');

        return redirect('firstparties');
    }

    /**
     * Show the form for editing the specified resource.
     * @param    int  $id
     * @return  View
     */
    public function edit($id)
    {
        $firstpartie = $this->firstpartieRepository->findOrfail($id);

        return view('first_partie.edit',compact('firstpartie'));
    }

    /**
     * update
     *
     * @param  int $id
     * @param  FirstpartieUpdateRequest $request
     * @return Redirect
     */
    public function update($id, FirstpartieRequest $request)
    {

        $this->firstpartieService->handle($request->validated(), $id);

        $request->session()->flash('success', 'updated successfully');

        return redirect('firstparties');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Firstpartie = $this->firstpartieRepository->findOrfail($id);

        $Firstpartie->delete();

        \Session::flash('success', 'deleted successfully');

        return back();
    }
}
