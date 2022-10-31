@extends('platform::dashboard')

@section('title', 'personal')
@section('description', 'description')

@section('navbar')
    {{-- <div class="text-center">
        Navbar
    </div> --}}
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{-- {{ __('Persona') }} --}}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('admin.personas.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Ci</th>

                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Direccion</th>
                                        <th>Nit</th>
                                        <th>Tipo</th>
                                        <th>Fecha Nacimiento</th>

                                        <th>T C</th>
                                        <th>T E</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personas as $persona)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $persona->ci }}</td>

                                            <td>{{ $persona->nombre }}</td>
                                            <td>{{ $persona->telefono }}</td>
                                            <td>{{ $persona->direccion }}</td>
                                            <td>{{ $persona->nit }}</td>
                                            <td>{{ $persona->tipo }}</td>
                                            <td>{{ $persona->fecha_nacimiento }}</td>

                                            <td>{{ $persona->T_C }}</td>
                                            <td>{{ $persona->T_E }}</td>

                                            <td>
                                                <form action="{{ route('admin.personas.destroy', $persona->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('admin.personas.show', $persona->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('admin.personas.edit', $persona->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $personas->links() !!}
            </div>
        </div>
    </div>
@stop
