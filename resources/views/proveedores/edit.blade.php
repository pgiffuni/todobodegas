@extends('layouts.app')

@section('content')

    <article class="container bg-light">
        <section class="row">
            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class=" col-md-9 container-left">
                <h1>Actualizar Proveedores</h1>
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-6 text-right rounded bg-white">

                        <form class="float-right" method="post"
                              action="{{ route('proveedores.update',[$proveedor->id]) }}">
                            {{ csrf_field() }}

                            <input type="hidden" name="_method" value="put">

                            <div class="form-group">

                                <label class="fa fa-id-card required" for="supplier-id_nit"> Numero del NIT:
                                </label>
                                <input id="supplier-id_nit"
                                       min="0"
                                       name="id_nit"
                                       placeholder="###.###.### - #"
                                       required
                                       type="number"
                                       value="{{ $proveedor->id_nit }}"
                                >
                            </div>
                            <div class="form-group">
                                <label class="fa fa-archway required" for="supplier-razon_social"> Razon Social:
                                </label>
                                <input id="supplier-razon_social"
                                       name="razon_social"
                                       placeholder="Nombre de la Empresa"
                                       required
                                       type="text"
                                       value="{{ $proveedor->razon_social }}"
                                >
                            </div>

                            <div class="form-group">
                                <label class="fas fa-pencil-alt prefix required" for="supplier-descripcion">
                                    Descripcion:
                                </label>
                                <textarea class="form-control"
                                          id="supplier-descripcion"
                                          name="descripcion"
                                          placeholder="Descripcion Larga"
                                          rows="4"
                                >
                                    {{ $proveedor->descripcion }}</textarea>
                            </div>

                            <div class="form-group">

                                <label class="fa fa-user required" for="supplier-rep_nombre"> Nombre del representante
                                    legal:
                                </label>
                                <input id="supplier-rep_nombre"
                                       name="rep_nombre"
                                       placeholder="Nombre"
                                       required
                                       type="text"
                                       value="{{ $proveedor->rep_nombre }}"
                                >
                            </div>
                            <div class="form-group">
                                <label for="supplier-rep_nombre_2">Segundo nombre del representante legal:</label>
                                <input id="supplier-rep_nombre_2"
                                       name="rep_nombre_2"
                                       placeholder="Nombre_2"
                                       type="text"
                                       value="{{ $proveedor->rep_nombre_2 }}"
                                >
                            </div>
                            <div class="form-group">
                                <label class="fa fa-user required" for="supplier-apellido"> Apellido del representante
                                    legal:
                                </label>
                                <input id="supplier-rep_apellido"
                                       name="rep_apellido"
                                       placeholder="Apellido"
                                       required
                                       type="text"
                                       value="{{ $proveedor->rep_apellido }}"
                                >
                            </div>
                            <div class="form-group">
                                <label for="supplier-apellido_2">Segundo apellido del representante legal:</label>
                                <input id="supplier-rep_apellido_2"
                                       name="rep_apellido_2"
                                       placeholder="Apellido_2"
                                       type="text"
                                       value="{{ $proveedor->rep_apellido_2 }}"
                                >
                            </div>
                            <div class="form-group">
                                <label class="fa fa-link required" for="supplier-sitio_web"> Sitio Web:
                                </label>
                                <input id="supplier-sitio_web"
                                       name="sitio_web"
                                       placeholder="http://todobodegas.tk/"
                                       required
                                       type="text"
                                       value="{{ $proveedor->sitio_web }}"
                                >
                            </div>
                            <div class="form-group">

                                <label class="fa fa-phone required" for="supplier-telefono"> Telefono sede
                                    administrativa:
                                </label>
                                <input id="supplier-telefono"
                                       name="telefono"
                                       placeholder="57 # ### ####"
                                       required
                                       type="tel"
                                       value="{{ $proveedor->telefono }}"
                                >
                            </div>
                            <div class="form-group">

                                <label class="fa fa-address-book required" for="supplier-direccion"> Direccion sede
                                    administrativa:
                                </label>
                                <input id="supplier-direccion"
                                       name="direccion"
                                       placeholder="Direccion Postal"
                                       required
                                       type="text"
                                       value="{{ $proveedor->direccion }}"
                                >
                            </div>
                            <div class="form-group">
                                <label for="supplier-ciudad">Ciudad:</label>
                                <input id="supplier-ciudad"
                                       name="ciudad"
                                       placeholder="Bogota"
                                       type="text"
                                       value="{{ $proveedor->ciudad }}"
                                >
                            </div>

                            <div class="form-group">
                                <label for="supplier-calificacion">Factor de Calificación:</label>
                                <input id="supplier-calificacion"
                                       max="100"
                                       min="0"
                                       name="calificacion"
                                       placeholder="0-100"
                                       type="number"
                                       value="{{ $proveedor->calificacion }}"
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
                                <p class="mb-0">Nuestros proveedores pueden tener mas de una bodega disponible en distintas zonas de la ciudad.</p>
                            </div>
                --}}

                <div class="p-3">
                    <h4 class="font-italic"> Acciones</h4>
                    <ol class="list-unstyled mb-0">
                        <li><a href="/proveedores/{{ $proveedor->id }}"> Ver Proveedor </a></li>
                        <li><a href="/proveedores/"> Listado de Proveedores</a></li>
                        <li><a href="#"> Añadir Nuevo Proveedor</a></li>
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
