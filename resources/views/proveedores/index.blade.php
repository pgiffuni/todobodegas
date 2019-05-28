@extends('layouts.app')

@section('content')
    <article class="container">
        <section class="row justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-4">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Listado de Proveedores</h2>
                        <a class="list-group-item list-group-item-action" href="/proveedores/create">
                            <i class="fa fa-archway"> Añadir Nuevo Proveedor</i></a>
                    </div>
                    <div class="list-group">

                        @foreach($proveedores as $proveedor)
                            <a class="list-group-item list-group-item-action"
                               href="/proveedores/{{ $proveedor->id }}">{{$proveedor->razon_social}}</a>
                        @endforeach
                    </div>

                </div>
            </div>
        </section>
    </article>
@endsection

