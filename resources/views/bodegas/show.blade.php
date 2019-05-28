@extends('layouts.app')

@section('content')

    <article class="container bg-light">
        <section class="row">
            <!-- Main jumbotron for a primary marketing message or call to action -->
            <div class=" col-md-9 container-left">
                <div class="jumbotron">
                    <div class="container">
                        <h1 class="display-3">{{ $bodega->nombre_bodega }}</h1>
                        <p>{{ $bodega->direccion_bodega }}</p>
                        <p>{{ $bodega->condiciones_especiales }}</p>
                        <p><i class="fa fa-truck"> Info de Contacto: </i>
                            {{ $bodega->rep_nombre }} {{ $bodega->rep_apellido }}</p>
                        <p><i class="fa fa-address-book"> Direccion: </i>
                            {{ $bodega->direccion_bodega }}</p>
                        <p><i class="fa fa-phone"> Telefono: </i>
                            {{ $bodega->telefono_bodega }}</p>
                        <p><i class="fa fa-square"> Area [m^2]: </i>
                            {{ $bodega->area_bodega }}</p>
                        <p><i class="fa fa-hand-holding-usd"> Costo por m^2: </i>
                            {{ $bodega->costo_por_metro }}</p>
                        {{--            <p><a class="btn btn-primary btn-lg" href="{{ $bodega->sitio_web }}" role="button">
                                            <i class="fa fa-home"></i> Mayor informacion»</a></p>--}}
                    </div>

                    <!-- Datos de cada Horario -->
                    {{--                    <div class="row">
                                            @foreach( $bodega->schedules as $horario )
                                                <div class="col-md-6 bg-light border">
                                                    <h2>{{ $horario->nombre_ref }}</h2>

                                                    <p><i class="fa fa-truck"> Descripcion: </i>
                                                        {{ $horario->descripcion}}</p>
                                                    <p><a class="btn btn-primary" href="/horarios/{{ $horario->id  }}" role="button">Ver
                                                            detalles
                                                            »</a></p>
                                                </div>
                                            @endforeach

                                        </div>--}}
                </div>

                @include('partials.comments')

                <form method="post" action="{{ route('comments.store') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="commentable_type" value="App\Store">
                    <input type="hidden" name="commentable_id" value="{{$bodega->id}}">

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
                        <textarea placeholder="Ingresar URL o foto"
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
                                <p class="mb-0">Nuestros bodegas pueden tener mas de una horario disponible en distintas zonas de la ciudad.</p>
                            </div>
                --}}

                <div class="p-3">
                    <h4 class="font-italic"> Acciones</h4>
                    <hr>
                    <ol class="list-unstyled mb-0">
                        <li><a href="/bodegas/"> Listado de Bodegas.</a></li>
                        <li><a href="/bodegas/{{ $bodega->id }}/edit"> Editar Bodega.</a></li>
                        <li><a href="/bodegas/create"> Añadir Nueva Bodega.</a></li>
                        <br>
                        <li>
                            <a
                                    href="#"
                                    onclick="
                  var result = confirm('¿Esta seguro de querer eliminar este bodega?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }
                          "
                            >
                                Eliminar bodega.
                            </a>

                            <form id="delete-form" action="{{ route('bodegas.destroy',[$bodega->id]) }}"
                                  method="POST" style="display: none;">
                                <input type="hidden" name="_method" value="delete">
                                {{ csrf_field() }}
                            </form>


                        </li>

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
