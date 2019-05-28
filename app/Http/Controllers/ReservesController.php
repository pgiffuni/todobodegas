<?php

namespace App\Http\Controllers;

use App\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Only read the entries created by the user.
        if (Auth::check()) {
            $reservas = Reserve::where('user_id', Auth::id())->get();
            return view('reservas.index', ['reservas' => $reservas]);
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
            return view('reservas.create');
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
            $reserva = Reserve::create([
                'nombre' => $request->input('nombre'),
                'area_requerida' => $request->input('area_requerida'),
                'fecha_inicio' => $request->input('fecha_inicio'),
                'fecha_fin'  => $request->input('fecha_fin'),
                'user_id' => Auth::id()
            ]);
            if($reserva){
                return redirect()->route('reservas.show', ['reserva'=> $reserva->id])
                    ->with('success' , 'Reserva creada exitosamente');
            }
        }

        return back()->withInput()->with('errors', 'Error al crear nueva reserva');

    }

    /**
     * Display the specified resource.
     *
     * @param  int: Eid
     * @return \Illuminate\Http\Response
     */
    public function show($reserve_id)
    {
//        dd($supplier->id);
//        $reserva = Reserve::query()->where('id', $supplier->id )->first();
//        $reserva = Reserve::query()->find( $supplier->id );
//        dd($reserva);

        if (Auth::check()) {
            return view('reservas.show', ['reserva' => Reserve::findOrFail($reserve_id)]);
        }
        return view('auth.login');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reserve  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($reserve_id)
    {
        //
        if (Auth::check()) {
            return view('reservas.edit', ['reserva' => Reserve::findOrFail($reserve_id)]);
        }
        return view('auth.login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reserve  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $reserve_id)
    {
        if (Auth::check()) {

            //save data
            $reservaUpdate = Reserve::where('id', $reserve_id)
                ->update([
                    'nombre' => $request->input('nombre'),
                    'area_requerida' => $request->input('area_requerida'),
                    'fecha_inicio' => $request->input('fecha_inicio'),
                    'fecha_fin'  => $request->input('fecha_fin')
                ]);
            if ($reservaUpdate) {
                return redirect()->route('reservas.show', ['reserva' => $reserve_id])
                    ->with('success', 'Reserva actualizada satisfactoriamente');
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
     * @param  \App\Reserve  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($reserve_id)
    {
        //
        if (!Auth::check()) {
            $findReserve = Reserve::find($reserve_id);
            if ($findReserve->delete()) {

                //redirect
                return redirect()->route('reservas.index')
                    ->with('success', 'Reserva eliminada exitosamente');
            }
        }
        return back()->withInput()->with('error', 'Reserva no pudo ser eliminada!');
    }
}
