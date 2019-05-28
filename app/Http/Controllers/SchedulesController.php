<?php

namespace App\Http\Controllers;

use App\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchedulesController extends Controller
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
            $horarios = Schedule::all();
            return view('horarios.index', ['horarios' => $horarios]);
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
            return view('horarios.create');
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
            $horario = Schedule::create([
                'nombre_ref' => $request->input('nombre_ref'),
                'fecha_inicio' => $request->input('fecha_inicio'),
                'fecha_fin' => $request->input('fecha_fin'),
                'descripcion' => $request->input('descripcion'),
                'store_id' => $request->input('store_id'),
                'user_id' => Auth::id()
            ]);
            if($horario){
                return redirect()->route('horarios.show', ['horario'=> $horario->id])
                    ->with('success' , 'Horario creado exitosamente');
            }
        }

        return back()->withInput()->with('errors', 'Error al crear nuevo horario');

    }

    /**
     * Display the specified resource.
     *
     * @param  int: Eid
     * @return \Illuminate\Http\Response
     */
    public function show($schedule_id)
    {
//        dd($supplier->id);
//        $horario = Schedule::query()->where('id', $supplier->id )->first();
//        $horario = Schedule::query()->find( $supplier->id );
//        dd($horario);

        if (Auth::check()) {
            return view('horarios.show', ['horario' => Schedule::findOrFail($schedule_id)]);
        }
        return view('auth.login');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schedule  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($schedule_id)
    {
        //
        if (Auth::check()) {
            return view('horarios.edit', ['horario' => Schedule::findOrFail($schedule_id)]);
        }
        return view('auth.login');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schedule  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $schedule_id)
    {
        if (Auth::check()) {

            //save data
            $horarioUpdate = Schedule::where('id', $schedule_id)
                ->update([
                    'nombre_ref' => $request->input('nombre_ref'),
                    'fecha_inicio' => $request->input('fecha_inicio'),
                    'fecha_fin' => $request->input('fecha_fin'),
                    'descripcion' => $request->input('descripcion'),
                    'store_id' => $request->input('store_id')
                ]);
            if ($horarioUpdate) {
                return redirect()->route('horarios.show', ['horario' => $schedule_id])
                    ->with('success', 'Horario actualizado satisfactoriamente');
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
     * @param  \App\Schedule  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($schedule_id)
    {
        //
        if (!Auth::check()) {
            $findSchedule = Schedule::find($schedule_id);
            if ($findSchedule->delete()) {

                //redirect
                return redirect()->route('horarios.index')
                    ->with('success', 'Proveedor eliminado exitosamente');
            }
        }
        return back()->withInput()->with('error', 'Proveedor no pudo ser eliminado!');
    }

}
