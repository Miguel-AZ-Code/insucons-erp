@extends('platform::dashboard')

@section('title', 'Bitácora')
@section('description', 'Registro de todas acciones realizadas por los usuarios')

@section('navbar')
    <div class="text-center">
        <button disabled="disabled" class="rounded">Exportar</button>
    </div>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Registro de actividades') }}
                            </span>

                            {{-- <div class="float-right">
                                <a href="{{ route('platform.activity.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div> --}}
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="usuarios" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Usuario</th>
                                        <th>Correo</th>
                                        <th>Descripción</th>
                                        {{-- <th>Cod sujeto</th> --}}
                                        <th>Fecha</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activityLogs as $activityLog)
                                        <tr>
                                            <td>{{ $activityLog->id }}</td>
                                            <td>{{ $activityLog->name }}</td>
                                            <td>{{ $activityLog->email }}</td>
                                            <td>{{ $activityLog->description }}
                                            </td>
                                            {{-- <td>{{ $activityLog->subject_id }}</td> --}}
                                            <td>{{ $activityLog->created_at }}</td>
                                            {{-- <td>
                                                <form action="{{ route('platform.activity.destroy', $activityLog->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('platform.activity.show', $activityLog->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('platform.activity.edit', $activityLog->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- {!! $activityLogs->links() !!}  --}}
            </div>
        </div>
    </div>
@stop
