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

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        {{-- <span class="card-title">Create Nota</span> --}}
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.notas.index') }}"> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.notas.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('admin.notas.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop