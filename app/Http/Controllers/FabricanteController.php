<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Fabricante;
class FabricanteController extends Controller {

         public function __construct(){
            $this->middleware('auth.basic', ['only' => ['index', 'store', 'update', 'destroy'] ]);
        }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return response()->json(['data' => Fabricante::all()],200);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
            if(!$request->input('nome') || !$request->input('telefono')){
                return response()->json(['messaggio' => "Manca un dato necessario", 'cod'=> 422],422);
            }
            
            Fabricante::create($request->all());
            return response()->json(['messaggio' => "Fabricante inserito con successo"],201);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
                $fabricante = Fabricante::find($id);
                if(!$fabricante)
                {
                    return response()->json(['messaggio' => "Non vi è alcun fabricante con quell'id", 'cod'=> 404],404);
                }
		return response()->json(['data' => $fabricante],200);
	}

	

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
            $metodo= $request->method();
            $fabricante= Fabricante::find($id);
            if(!$fabricante){
                return response()->json(['messaggio' => "Non vi è alcun fabricante con quell'id", 'cod'=> 404],404);
            }
            $nome = $request->input('nome');
            $tel = $request->input('telefono');
            if($metodo === "PATCH"){
                
                
                if($nome != null && $nome != ''){
                $fabricante->nome = $nome;
                }
                
                if($tel != null && $tel != ''){
                $fabricante->telefono = $tel;
                }
                $fabricante->save();
                return "update con patch"; 
            } 
            if (!$nome || !$tel){
                return response()->json(['messaggio' => "Manca un dato fondamentale", 'cod'=> 422],422);
            }
            $fabricante->nome = $nome;
            $fabricante->telefono= $tel;
            $fabricante->save();
		return response()->json(['messaggio' => "Fabricante modificato con successo"],200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
