@extends('layouts.app')

@section('content')
    <article class="container">
        <section class="row justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Listado de Reservas</h2>
                        <a class="list-group-item list-group-item-action" href="/reservas/create">
                            <i class="fa fa-tags"> Añadir Nueva Reserva</i>
                        </a>
                    </div>
                    <div class="list-group">

                        @foreach($reservas as $reserva)
                            <a class="list-group-item list-group-item-action"
                               href="/reservas/{{ $reserva->id }}">{{$reserva->nombre}}</a>
                        @endforeach
                    </div>

                </div>
            </div>
        </section>
    </article>
@endsection

