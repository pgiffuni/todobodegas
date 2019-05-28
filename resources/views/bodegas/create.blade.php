@extends('layouts.app')

@section('content')

    <article class="container bg-light">
        <section class="row">
            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class=" col-md-9 container-left">
                <h1>Ingreso de Nueva Bodega</h1>
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-6 text-right rounded bg-white">

                        <form class="float-right" method="post"
                              action="{{ route('bodegas.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="store-nombre"> Nombre:
                                </label>
                                <input id="store-nombre"
                                       name="nombre_bodega"
                                       placeholder="Nombre de la Bodega"
                                       type="text"
                                >
                            </div>

                            @if($proveedores == null)
                                <input id="supplier_id"
                                       name="supplier_id"
                                       type="hidden"
                                       value="{{$proveedor_id}}"
                                >
                            @else
                                <div class="form-group">
                                    <label class="fa fa-archway required" for="supplier-content"> Seleccionar
                                        Proveedor</label>

                                    <select name="supplier_id" class="form-control">

                                        @foreach($proveedores as $proveedor)
                                            <option value="{{$proveedor->id}}"> {{$proveedor->razon_social}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            <div class="form-group">

                                <label class="fa fa-address-book required" for="store-direccion"> Direccion bodega:
                                </label>
                                <input id="store-direccion"
                                       name="direccion_bodega"
                                       placeholder="Direccion Postal"
                                       required
                                       type="text"
                                >
                            </div>
                            <div class="form-group">

                                <label for="store-telefono"> Telefono bodega:
                                </label>
                                <input id="store-telefono"
                                       name="telefono_bodega"
                                       placeholder="57 # ### ####"
                                       type="tel"
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
                                >
                            </div>
                            <div class="form-group">
                                <label class="fa fa-hand-holding-usd required" for="store-costo_por_metro"> Costo por
                                    m^2</label>
                                <input id="store-costo_por_metro"
                                       name="costo_por_metro"
                                       placeholder="0"
                                       required
                                       type="number"
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
                                    </textarea>
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
                                <p class="mb-0">Nuestros bodegas pueden tener mas de una bodega disponible en distintas zonas de la ciudad.</p>
                            </div>
                --}}

                <div class="p-3">
                    <h4 class="font-italic"> Acciones</h4>
                    <ol class="list-unstyled mb-0">
                        <li><a href="/bodegas/"> Listado de Bodegas</a></li>
                    </ol>
                </div>

                {{--            <div class="p-3">
                                <h4 class="font-italic"> Bodegaes </h4>
                                <ol class="list-unstyled">
                                    <li><a href="#">GitHub</a></li>
                                </ol>
                            </div>--}}
            </aside>
        </section>
    </article> <!-- /container -->
@endsection
