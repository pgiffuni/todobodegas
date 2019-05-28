<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuppliersController extends Controller
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
            $proveedores = Supplier::all();
            return view('proveedores.index', ['proveedores' => $proveedores]);
        }
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Auth::check()) {
            return view('proveedores.create');
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
            $proveedor = Supplier::create([
                'id_nit'=> $request->input('id_nit'),
                'razon_social'=> $request->input('razon_social'),
                'descripcion'=> $request->input('descripcion'),
                'rep_nombre'=> $request->input('rep_nombre'),
                'rep_nombre_2'=> $request->input('rep_nombre_2'),
                'rep_apellido'=> $request->input('rep_apellido'),
                'rep_apellido_2'=> $request->input('rep_apellido_2'),
                'sitio_web'=> $request->input('sitio_web'),
                'telefono'=> $request->input('telefono'),
                'direccion'=> $request->input('direccion'),
                'ciudad'=> $request->input('ciudad'),
                'calificacion'=> $request->input('calificacion'),
                'user_id' => Auth::id()
            ]);
            if($proveedor){
                return redirect()->route('proveedores.show', ['proveedor'=> $proveedor->id])
                    ->with('success' , 'Proveedor creado exitosamente');
            }
        }

        return back()->withInput()->with('errors', 'Error al crear nuevo proveedor');

    }

    /**
     * Display the specified resource.
     *
     * @param  int: Eid
     * @return \Illuminate\Http\Response
     */
    public function show($supplier_id)
    {
//        dd($supplier->id);
//        $proveedor = Supplier::query()->where('id', $supplier->id )->first();
        $supplier = Supplier::findOrFail($supplier_id);
//        dd($proveedor);
        $comments = $supplier->comments;

        return view('proveedores.show', ['proveedor' => $supplier, 'comments'=> $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($supplier_id)
    {
        //
        if (Auth::check()) {
            return view('proveedores.edit', ['proveedor' => Supplier::findOrFail($supplier_id)]);
        }
        return view('auth.login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $supplier_id)
    {
        if (Auth::check()) {

            //save data
            $proveedorUpdate = Supplier::where('id', $supplier_id)
                ->update([
                    'id_nit' => $request->input('id_nit'),
                    'razon_social' => $request->input('razon_social'),
                    'descripcion' => $request->input('descripcion'),
                    'rep_nombre' => $request->input('rep_nombre'),
                    'rep_nombre_2' => $request->input('rep_nombre_2'),
                    'rep_apellido' => $request->input('rep_apellido'),
                    'rep_apellido_2' => $request->input('rep_apellido_2'),
                    'sitio_web' => $request->input('sitio_web'),
                    'telefono' => $request->input('telefono'),
                    'direccion' => $request->input('direccion'),
                    'ciudad' => $request->input('ciudad'),
                    'calificacion' => $request->input('calificacion')
                ]);
            if ($proveedorUpdate) {
                return redirect()->route('proveedores.show', ['proveedor' => $supplier_id])
                    ->with('success', 'Proveedor actualizado satisfactoriamente');
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
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($supplier_id)
    {
        //
        if (!Auth::check()) {
            $findSupplier = Supplier::find($supplier_id);
            if ($findSupplier->delete()) {

                //redirect
                return redirect()->route('proveedores.index')
                    ->with('success', 'Proveedor eliminado exitosamente');
            }
        }
        return back()->withInput()->with('error', 'Proveedor no pudo ser eliminado!');
    }
}
