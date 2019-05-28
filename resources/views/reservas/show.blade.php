@extends('layouts.app')

@section('content')

    <article class="container bg-light">
        <section class="row">
            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class=" col-md-9 container-left">
                <div class="jumbotron">
                    <div class="container">
                        <h1 class="display-3">{{ $reserva->nombre }}</h1>
                        <p><i class="fa fa-square"> Area Requerida: </i>
                            {{ $reserva->area_requerida }}</p>
                        <p><i class="fa fa-date"> Fecha inicio: </i>
                            {{ $reserva->fecha_inicio }}</p>
                        <p><i class="fa fa-date"> Fecha fin </i>
                            {{ $reserva->fecha_fin }}</p>
                        {{--            <p><a class="btn btn-primary btn-lg" href="{{ $reserva->sitio_web }}" role="button">
                                            <i class="fa fa-home"></i> Mayor informacion»</a></p>--}}
                    </div>


                    <!-- Datos de cada Horario-->
                    {{--                    <div class="row">
                                            @foreach( $reserva->schedules as $horario )
                                                <div class="col-md-6 bg-light border">
                                                    <h2>{{ $store->nombre_ref }}</h2>

                                                    <p><i class="fa fa-truck"> Descripcion: </i>
                                                        {{ $store->descripcion }}</p>
                                                    <p><a class="btn btn-primary" href="/horarios/{{ $horario->id  }}" role="button">Ver
                                                            detalles
                                                            »</a></p>
                                                </div>
                                            @endforeach

                                        </div>--}}
                </div>
            </div>
            <hr>

            <aside class="col-md-3 blog-sidebar container-right">
                {{--
                            <div class="p-2 mb-2 bg-light rounded">
                                <h4 class="font-italic">Acerca de ...</h4>
                                <p class="mb-0">Nuestros reservas pueden tener mas de una bodega disponible en distintas zonas de la ciudad.</p>
                            </div>
                --}}

                <div class="p-3">
                    <h4 class="font-italic"> Acciones</h4>
                    <hr>
                    <ol class="list-unstyled mb-0">
                        <li><a href="/reservas/"> Listado de Reservas.</a></li>
                        <li><a href="/reservas/create"> Añadir Nueva Reserva.</a></li>
                        <li><a href="/reservas/{{ $reserva->id }}/edit"> Editar Reserva.</a></li>

                        <li>
                            <a
                                    href="#"
                                    onclick="
                  var result = confirm('¿Esta seguro de querer eliminar este reserva?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }
                          "
                            >
                                Eliminar reserva.
                            </a>

                            <form id="delete-form" action="{{ route('reservas.destroy',[$reserva->id]) }}"
                                  method="POST" style="display: none;">
                                <input type="hidden" name="_method" value="delete">
                                {{ csrf_field() }}
                            </form>

                        </li>
                        <br>
                        <li><a href="/schedules/create"> Añadir Nuevo Horario.</a></li>

                    </ol>
                    <hr>
                </div>

                {{--            <div class="p-3">
                                <h4 class="font-italic"> Proveedores </h4>
                                <ol class="list-unstyled">
                                    <li><a href="#">GitHub</a></li>
                                </ol>
                            </div>--}}
            </aside>
        </section>
    </article> <!-- /container -->
@endsection
