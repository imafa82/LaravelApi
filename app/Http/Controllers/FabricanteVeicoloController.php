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
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $idFabricante, $idVeicolo)
	{
		 $metodo= $request->method();
            $fabricante= Fabricante::find($idFabricante);
            if(!$fabricante){
                return response()->json(['messaggio' => "Non vi è alcun fabricante con quell'id", 'cod'=> 404],404);
            }
            $veicolo = $fabricante->veicoli()->find($idVeicolo);
            if(!$veicolo){
                return response()->json(['messaggio' => "Non vi è alcun veicolo associato a quel fabricante", 'cod'=> 404],404);
            }
            $colore = $request->input('colore');
            $cilindrata = $request->input('cilindrata');
            $potenza = $request->input('potenza');
            $peso = $request->input('peso');
            if($metodo === "PATCH"){
                
                
                if($colore != null && $colore != ''){
                $veicolo->colore = $colore;
                }
                
                if($cilindrata != null && $cilindrata != ''){
                $veicolo->cilindrata = $cilindrata;
                }
                
                 if($potenza != null && $potenza != ''){
                $veicolo->potenza = $potenza;
                }
                
                 if($peso != null && $peso != ''){
                $veicolo->peso = $peso;
                }
                $veicolo->save();

                return response()->json(['messaggio' => "Veicolo modificato con successo"],200);

            } 
            if (!$colore || !$cilindrata || !$potenza || !$peso){
                return response()->json(['messaggio' => "Manca un dato fondamentale", 'cod'=> 422],422);
            }
             $veicolo->colore = $colore;
             $veicolo->cilindrata = $cilindrata;
             $veicolo->potenza = $potenza;
             $veicolo->peso = $peso;
            $veicolo->save();
		return response()->json(['messaggio' => "Veicolo modificato con successo"],200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($idFabricante, $idVeicolo)
	{
            $fabricante = Fabricante::find($idFabricante);
             if(!$fabricante){
                return response()->json(['messaggio' => "Non vi è alcun fabricante con quell'id", 'cod'=> 404],404);
            }
            $veicolo = $fabricante->veicoli()->find($idVeicolo);
            if(!$veicolo){
                return response()->json(['messaggio' => "Non vi è alcun veicolo associato a quel fabricante", 'cod'=> 404],404);
            }
            $veicolo->delete();
		return response()->json(['messaggio' => "Veicolo eliminato con successo"],200);
	}

}
