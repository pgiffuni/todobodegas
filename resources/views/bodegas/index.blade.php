@extends('layouts.app')

@section('content')
    <article class="container">
        <section class="row justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Listado de Bodegas</h2>
                        <a class="list-group-item list-group-item-action" href="/bodegas/create">
                            <i class="fa fa-truck"> Añadir Nueva Bodega</i></a>
                    </div>
                    <div class="list-group">

                        @foreach($bodegas as $bodega)
                            <a class="list-group-item list-group-item-action"
                               href="/bodegas/{{ $bodega->id }}">{{$bodega->direccion_bodega}}</a>
                        @endforeach
                    </div>

                </div>
            </div>
        </section>
    </article>
@endsection

