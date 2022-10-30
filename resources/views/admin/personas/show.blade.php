@extends('platform::dashboard')

@section('title', 'title')
@section('description', 'description')

@section('navbar')
    <div class="text-center">
        Navbar
    </div>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Persona</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.personas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Ci:</strong>
                            {{ $persona->ci }}
                        </div>

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $persona->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $persona->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $persona->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Nit:</strong>
                            {{ $persona->nit }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo:</strong>
                            {{ $persona->tipo }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Nacimiento:</strong>
                            {{ $persona->fecha_nacimiento }}
                        </div>

                        <div class="form-group">
                            <strong>T C:</strong>
                            {{ $persona->T_C }}
                        </div>
                        <div class="form-group">
                            <strong>T E:</strong>
                            {{ $persona->T_E }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
