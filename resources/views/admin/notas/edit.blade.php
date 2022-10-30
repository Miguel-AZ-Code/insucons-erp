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
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        {{-- <span class="card-title">Update Nota</span> --}}
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.notas.index') }}"> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.notas.update', $notas->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.notas.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
