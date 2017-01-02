<?php


namespace App\Http\Controllers;
use App\Prova;

class MyController  extends Controller {
    public function index()
	{
                $modello = new Prova();
                $saluto = $modello->saluta("Massy");
                //$saluto = "ciao ila";
		return view('prova', array('saluto' => $saluto));
	}
    //put your code here
}
