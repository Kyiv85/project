<?php

namespace App\Http\Controllers;

use App\Services;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use App\Http\Resources\Services as ServicesResource;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
  
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    try{
      $services = new Services;
      $services->nro_cliente = $request->nro_cliente;
      $services->fecha = $request->fecha;
      $services->servicio = $request->servicio;
      $services->save();
      new ServicesResource($services);
      return response()->json(['message' => 'Servicio creado satisfactoriamente']);
    }catch (\Exception $e){
      Log::info('Faltan paŕametros o no se enviaron correctamente '.$e->getMessage());
      return response()->json(['message' => 'Faltan paŕametros o no se enviaron correctamente']);
    }
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      try{
        $services = Services::findOrFail($id);
        $services->activo = false;
        $services->save();
        new ServicesResource($services);
        return response()->json(['message' => 'Servicio eliminado satisfactoriamente']);
      }catch (\Exception $e){
        Log::info('Faltan paŕametros o no se enviaron correctamente '.$e->getMessage());
        return response()->json(['message' => 'Faltan paŕametros o no se enviaron correctamente']);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
