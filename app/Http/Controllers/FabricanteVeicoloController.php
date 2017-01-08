<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Fabricante;

use App\Veicolo;

class FabricanteVeicoloController extends Controller {

     public function __construct(){
            $this->middleware('auth.basic', ['only' => ['store', 'update', 'destroy'] ]);
        }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
            $fabricante = Fabricante::find($id);
            if(!$fabricante){
                return response()->json(['messaggio' => "Non vi è alcun fabricante con id ".$id, 'cod'=> 404],404);
            }
		return response()->json(['data' => $fabricante->veicoli], 200);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		return 'mostra form per aggregare un veicolo al fornitore con id'.$id;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request, $id)
	{
		//fabricante_id
            //serie
            //colore
            //cilindrata
            //potenza
            //peso
            if(!$request->input('colore') || !$request->input('cilindrata') || !$request->input('potenza') || !$request->input('peso')){
                return response()->json(['messaggio' => "Manca un dato necessario", 'cod'=> 422],422);
            }
            $fabricante = Fabricante::find($id);
            if(!$fabricante){
                return response()->json(['messaggio' => "Non vi è alcun fabricante con id ".$request->input('fabricante_id'), 'cod'=> 404],404);
            }
            
            $fabricante->veicoli()->create($request->all());
            return response()->json(['messaggio' => "Veicolo inserito con successo"],201);
            
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($idFabricante, $idVeicolo)
	{
		return 'Mostra il veicolo '.$idVeicolo.' del fabricante '.$idFabricante;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($idFabricante, $idVeicolo)
	{
		return 'modificare veicolo '.$idVeicolo.' del fabricante '.$idFabricante;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($idFabricante, $idVeicolo)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($idFabricante, $idVeicolo)
	{
		//
	}

}
