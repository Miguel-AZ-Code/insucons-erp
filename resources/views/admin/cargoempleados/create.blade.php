@extends('platform::dashboard')

@section('title', 'Contrato')
@section('description', 'description')

@section('navbar')
    {{-- <div class="text-center">
        Navbar
    </div> --}}
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{-- {{ __('Cargoempleado') }} --}}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('admin.contratos.index') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Back') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.contratos.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('admin.cargoempleados.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
