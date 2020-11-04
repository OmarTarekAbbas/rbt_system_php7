<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index');
    }
    public function elFinderlEfinder()
    {
        return view('elFinder.elfinder');
    }

    public function store_routes_in_database()
    {
        $routeCollection = \Route::getRoutes();

        foreach ($routeCollection as $value) {



          if( array_key_exists('controller', $value->getAction()) ){
            list($controller, $action) = explode('@', class_basename($value->getAction()['controller']));
            echo $controller;

          }
          echo " Route: ";
          echo $value->uri();
          echo "<br>";

          echo " Controller: ";
          echo $controller;
          echo "<br>";

          echo " Action: ";
          echo $action;
          echo "<br>";

          echo " Prefix: ";
          echo $value->getPrefix();
          echo "<br>";
          echo " Name: ";
          echo $value->getName();
          echo "<br>";
          echo "------------------------------";
          echo "<br>";
        }
        dd("end");
    }

}
