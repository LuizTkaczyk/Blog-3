@extends('adminlte::page')

@section('title', 'Laravel')

@section('content_header')
    <a class="btn btn-secondary float-right" href="{{ route('admin.roles.create') }}">Nova função</a>
    <h1>Lista de permissões</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <div class="card">
        <div class="card-boy">

            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Função</th>
                    <th colspan="2"></th>

                </thead>

                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td width="10px">
                                <a class="btn btn-sm btn-primary" href="{{ route('admin.roles.edit', $role) }}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.roles.destroy', $role) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger"> Excluir</button>

                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </div>
@stop
