@extends('layouts.app')

@section('content')

    <article class="container bg-light">
        <section class="row">
            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class=" col-md-9 container-left">
                <div class="jumbotron">
                    <div class="container">
                        <h1 class="display-3">{{ $proveedor->razon_social }}</h1>
                        <p>{{ $proveedor->descripcion }}</p>
                        <p><i class="fa fa-id-card"> NIT: </i>
                            {{ $proveedor->id_nit }}</p>
                        <p><i class="fa fa-user"> Info de Contacto: </i>
                            {{ $proveedor->rep_nombre }} {{ $proveedor->rep_apellido }}</p>
                        <p><i class="fa fa-address-book"> Direccion: </i>
                            {{ $proveedor->direccion }}</p>
                        <p><i class="fa fa-phone"> Telefono: </i>
                            {{ $proveedor->telefono }}</p>
                        <p><i class="fa fa-link"> Sitio Web: </i>
                            {{ $proveedor->sitio_web }}</p>
                        {{--            <p><a class="btn btn-primary btn-lg" href="{{ $proveedor->sitio_web }}" role="button">
                                            <i class="fa fa-home"></i> Mayor informacion»</a></p>--}}
                    </div>


                    <!-- Datos de cada Bodega -->
                    <div class="row">
                        @foreach( $proveedor->stores as $store )
                            <div class="col-md-6 bg-light border">
                                <h2>{{ $store->nombre_bodega }}</h2>

                                <p><i class="fa fa-address-book"> Direccion: </i>
                                    {{ $store->direccion_bodega }}</p>
                                <p><a class="btn btn-primary" href="/bodegas/{{ $store->id  }}" role="button">Ver
                                        detalles
                                        »</a></p>
                            </div>
                        @endforeach

                    </div>
                </div>

                @include('partials.comments')

                <form method="post" action="{{ route('comments.store') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="commentable_type" value="App\Supplier">
                    <input type="hidden" name="commentable_id" value="{{$proveedor->id}}">

                    <div class="form-group">
                        <label for="comment-content">Comentario</label>
                        <textarea placeholder="Ingresar Comentario"
                                  style="resize: vertical"
                                  id="comment-content"
                                  name="body"
                                  rows="3" spellcheck="false"
                                  class="form-control autosize-target text-left">

                                          </textarea>
                    </div>

                    <div class="form-group">
                        <label for="comment-content"> (URL/Fotos)</label>
                        <textarea placeholder="Ingresar URL"
                                  style="resize: vertical"
                                  id="comment-content"
                                  name="url"
                                  rows="2" spellcheck="false"
                                  class="form-control autosize-target text-left">

                                          </textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary"
                               value="Submit"/>
                    </div>
                </form>

            </div>
            <hr>

            <aside class="col-md-3 blog-sidebar container-right">
                {{--
                            <div class="p-2 mb-2 bg-light rounded">
                                <h4 class="font-italic">Acerca de ...</h4>
                                <p class="mb-0">Nuestros proveedores pueden tener mas de una bodega disponible en distintas zonas de la ciudad.</p>
                            </div>
                --}}

                <div class="p-3">
                    <h4 class="font-italic"> Acciones</h4>
                    <hr>
                    <ol class="list-unstyled mb-0">
                        <li><a href="/proveedores/"> Listado de Proveedores.</a></li>
                        <li><a href="/proveedores/create"> Añadir Nuevo Proveedor.</a></li>
                        <li><a href="/proveedores/{{ $proveedor->id }}/edit"> Editar Proveedor.</a></li>

                            <li>
                                <a
                                        href="#"
                                        onclick="
                  var result = confirm('¿Esta seguro de querer eliminar este proveedor?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }
                          "
                                >
                                    Eliminar proveedor.
                                </a>

                                <form id="delete-form" action="{{ route('proveedores.destroy',[$proveedor->id]) }}"
                                      method="POST" style="display: none;">
                                    <input type="hidden" name="_method" value="delete">
                                    {{ csrf_field() }}
                                </form>
                            </li>

                        <br>
                        <li><a href="/bodegas/create/{{ $proveedor->id }}"> Añadir Nueva Bodega.</a></li>

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
