@extends('adminlte::page')

@section('title', 'Laravel')

@section('content_header')

    @can('admin.tags.create')
        <a class="btn btn-secondary float-right" href="{{ route('admin.tags.create') }}">Criar nova Tag</a>
    @endcan

    <h1>Mostrar lista de tags</h1>
@stop

@section('content')

    @if (session('info'))

        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>

    @endif


    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td width="10px">
                                {{-- com a tag can, a opção somente aparecerá para o usuario adm --}}
                                @can('admin.tags.edit')

                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.tags.edit', $tag) }}">Editar</a>
                                @endcan
                            </td>



                            <td width="10px">
                                {{-- com a tag can, a opção somente aparecerá para o usuario adm --}}
                                @can('admin.tags.destroy')
                                    <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
                                        @csrf
                                        @method('delete')

                                        <button class="btn btn-danger btn-sm" type="submit">Excluir</button>

                                    </form>
                                @endcan


                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@stop
