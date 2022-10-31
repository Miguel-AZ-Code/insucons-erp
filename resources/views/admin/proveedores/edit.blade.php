@extends('platform::dashboard')

@section('title', 'Proveedor')
@section('description', 'description')

@section('navbar')
    {{-- <div class="text-center">
        Navbar
    </div> --}}
@stop

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{-- {{ __('Proveedores') }} --}}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('admin.proveedores.index') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('back') }}
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.proveedores.update', $proveedore->id) }}"
                            role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.proveedores.form')
                            {{-- redirige al metodo store rescatando el id --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
