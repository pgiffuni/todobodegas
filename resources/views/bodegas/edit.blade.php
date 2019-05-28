@extends('layouts.app')

@section('content')

    <article class="container bg-light">
        <section class="row">
            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class=" col-md-9 container-left">
                <h1>Actualizar Bodegas</h1>
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-6 text-right rounded bg-white">

                        <form class="float-right" method="post"
                              action="{{ route('bodegas.update',[$bodega->id]) }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="_method" value="put">

                            <div class="form-group">
                                <label for="store-nombre"> Nombre:
                                </label>
                                <input id="store-nombre"
                                       name="nombre_bodega"
                                       placeholder="Nombre de la Bodega"
                                       type="text"
                                       value="{{ $bodega->nombre_bodega }}"
                                >
                            </div>

                            <div class="form-group">

                                <label class="fa fa-address-book required" for="store-direccion"> Direccion bodega:
                                </label>
                                <input id="store-direccion"
                                       name="direccion_bodega"
                                       placeholder="Direccion Postal"
                                       required
                                       type="text"
                                       value="{{ $bodega->direccion_bodega }}"
                                >
                            </div>
                            <div class="form-group">

                                <label for="store-telefono"> Telefono bodega:
                                </label>
                                <input id="store-telefono"
                                       name="telefono_bodega"
                                       placeholder="57 # ### ####"
                                       type="tel"
                                       value="{{ $bodega->telefono_bodega }}"
                                >
                            </div>

                            <div class="form-group">
                                <label class="fa fa-square required" for="store-area"> Area en m^2:</label>
                                <input id="store-area"
                                       max="250"
                                       min="1"
                                       name="area_bodega"
                                       placeholder="1-250"
                                       required
                                       type="number"
                                       value="{{ $bodega->area_bodega }}"
                                >
                            </div>
                            <div class="form-group">
                                <label class="fa fa-hand-holding-usd required" for="store-costo_por_metro"> Costo por
                                    m^2</label>
                                <input id="store-costo_por_metro"
                                       name="costo_por_metro"
                                       placeholder="0"
                                       type="number"
                                       required
                                       value="{{ $bodega->costo_por_metro }}"
                                >
                            </div>

                            <div class="form-group">
                                <label for="store-condiciones_especificas"> Descripcion:
                                </label>
                                <textarea class="form-control"
                                          id="store-condiciones_especificas"
                                          name="condiciones_especificas"
                                          placeholder="Condiciones: refrigeracion, ventilacion, etc"
                                          rows="4"
                                >
                                    {{ $bodega->condiciones_especificas }}</textarea>
                            </div>

                            {{--
                                                        $table->unsignedInteger('supplier_id');
                            --}}
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
                                <p class="mb-0">Nuestros bodegas pueden tener mas de una bodega disponible en distintas zonas de la ciudad.</p>
                            </div>
                --}}

                <div class="p-3">
                    <h4 class="font-italic"> Acciones</h4>
                    <ol class="list-unstyled mb-0">
                        <li><a href="/bodegas/{{ $bodega->id }}"> Ver Bodega </a></li>
                        <li><a href="/bodegas/"> Listado de Bodegas</a></li>
                        <li><a href="#"> Añadir Nueva Bodegar</a></li>
                    </ol>
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
