@extends('layouts.app')

@section('content')

    <article class="container bg-light">
        <section class="row">
            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class=" col-md-9 container-left">
                <h1>Actualizar Reservas</h1>
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-6 text-right rounded bg-white">

                        <form class="float-right" method="post"
                              action="{{ route('reservas.update',[$reserva->id]) }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="_method" value="put">

                            <div class="form-group">
                                <label for="reserve-nombre"> Nombre del representante legal:
                                </label>
                                <input id="reserve-nombre"
                                       name="nombre"
                                       placeholder="Nombre de la reserva"
                                       type="text"
                                       value="{{ $reserva->nombre }}"
                                >
                            </div>
                            <div class="form-group">

                                <label class="fa fa-id-square required" for="reserve-area_requerida"> Numero del NIT:
                                </label>
                                <input id="reserve-area_requerida"
                                       min="0"
                                       name="area_requerida"
                                       placeholder="###"
                                       required
                                       type="number"
                                       value="{{ $reserva->area_requerida }}"
                                >
                            </div>
                            <div class="form-group">
                                <label class="fa fa-calendar required" for="reserve-fecha_inicio"> Fecha Inicial:
                                </label>
                                <input id="reserve-fecha_inicio"
                                       name="fecha_inicio"
                                       placeholder="aaaa-mm-dd"
                                       required
                                       type="date"
                                       value="{{ $reserva->fecha_inicio }}"
                                >
                            </div>
                            <div class="form-group">
                                <label class="fa fa-calendar required" for="reserve-fecha_fin"> Fecha Final:
                                </label>
                                <input id="reserve-fecha_fin"
                                       name="fecha_fin"
                                       placeholder="aaaa-mm-dd"
                                       required
                                       type="date"
                                       value="{{ $reserva->fecha_fin}}"
                                >
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

            <aside class="col-md-3 blog-sidebar container-right">
                {{--
                            <div class="p-2 mb-2 bg-light rounded">
                                <h4 class="font-italic">Acerca de ...</h4>
                                <p class="mb-0">Nuestros reservas pueden tener mas de una bodega disponible en distintas zonas de la ciudad.</p>
                            </div>
                --}}

                <div class="p-3">
                    <h4 class="font-italic"> Acciones</h4>
                    <ol class="list-unstyled mb-0">
                        <li><a href="/reservas/{{ $reserva->id }}"> Ver Reserva </a></li>
                        <li><a href="/reservas/"> Listado de Reservas</a></li>
                        <li><a href="#"> Añadir Nueva Reserva</a></li>
                    </ol>
                </div>

                {{--            <div class="p-3">
                                <h4 class="font-italic"> Reservas </h4>
                                <ol class="list-unstyled">
                                    <li><a href="#">GitHub</a></li>
                                </ol>
                            </div>--}}
            </aside>
        </section>
    </article> <!-- /container -->
@endsection
