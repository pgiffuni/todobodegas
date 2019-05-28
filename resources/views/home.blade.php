@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h1>Has ingresado al sistema!</h1>
                        <p>
                        Sigue los menus en la esquina superior derecha para adecuar la informacion de tus proveedores y bodegas.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
