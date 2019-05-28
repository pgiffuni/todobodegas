<?php

namespace App\Http\Controllers;

use App\Store;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Auth::check()) {
            $bodegas = Store::all();
            return view('bodegas.index', ['bodegas' => $bodegas]);
        }
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( $supplier_id = null )
    {
        //
        $suppliers = null;
        if(!$supplier_id){
            $suppliers = Supplier::where('user_id', Auth::user()->id)->get();
        }
        if (Auth::check()) {
            return view('bodegas.create', ['proveedor_id'=>$supplier_id,'proveedores'=>$suppliers]);
        }
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if(Auth::check()){
            $bodega = Store::create([
                'nombre_bodega' => $request->input('nombre_bodega'),
                'direccion_bodega' => $request->input('direccion_bodega'),
                'area_bodega' => $request->input('area_bodega'),
                'telefono_bodega' => $request->input('telefono_bodega'),
                'costo_por_metro' => $request->input('costo_por_metro'),
                'condiciones_especificas' => $request->input('condiciones_especificas'),
                'supplier_id' => $request->input('supplier_id'),
                'user_id' => Auth::id()
            ]);
            if($bodega){
                return redirect()->route('bodegas.show', ['bodega'=> $bodega->id])
                    ->with('success' , 'Bodega creado exitosamente');
            }
        }

        return back()->withInput()->with('errors', 'Error al crear nuevo bodega');

    }

    /**
     * Display the specified resource.
     *
     * @param  int: Eid
     * @return \Illuminate\Http\Response
     */
    public function show($store_id)
    {
//        dd($supplier->id);
//        $bodega = Store::query()->where('id', $supplier->id )->first();
        $store = Store::findOrFail($store_id);
//        dd($bodega);
        $comments = $store->comments;

            return view('bodegas.show', ['bodega' => $store, 'comments'=> $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Store  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($store_id)
    {
        //
        if (Auth::check()) {
            return view('bodegas.edit', ['bodega' => Store::findOrFail($store_id)]);
        }
        return view('auth.login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Store  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $store_id)
    {
        if (Auth::check()) {

            //save data
            $bodegaUpdate = Store::where('id', $store_id)
                ->update([
                    'nombre_bodega' => $request->input('nombre_bodega'),
                    'direccion_bodega' => $request->input('direccion_bodega'),
                    'area_bodega' => $request->input('area_bodega'),
                    'telefono_bodega' => $request->input('telefono_bodega'),
                    'costo_por_metro' => $request->input('costo_por_metro'),
                    'condiciones_especificas' => $request->input('condiciones_especificas'),
                    'supplier_id' => $request->input('supplier_id')
                ]);
            if ($bodegaUpdate) {
                return redirect()->route('bodegas.show', ['bodega' => $store_id])
                    ->with('success', 'Bodega actualizada satisfactoriamente');
            }
            //redirect
            return back()->withInput();
        }
        //
        return view('auth.login');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Store  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($store_id)
    {
        //
        if (!Auth::check()) {
            $findStore = Store::find($store_id);
            if ($findStore->delete()) {

                //redirect
                return redirect()->route('bodegas.index')
                    ->with('success', 'Bodega eliminada exitosamente');
            }
        }
        return back()->withInput()->with('error', 'Bodega no pudo ser eliminada!');
    }
}
