<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Veicolo;
class VeicoloController extends Controller {
    
        

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return response()->json(['data' => Veicolo::all()],200);
	}

	

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		 $veicolo = Veicolo::find($id);
                if(!$veicolo)
                {
                    return response()->json(['messaggio' => "Non vi è alcun veicolo con id ".$id, 'cod'=> 404],404);
                }
		return response()->json(['data' => $veicolo],200);
	}


}
