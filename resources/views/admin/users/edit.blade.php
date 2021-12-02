@extends('adminlte::page')

@section('title', 'Laravel')

@section('content_header')
    <h1>Realizar uma função</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
    @else
        
    @endif

    <div class="card">
        <div class="card-body">
            <p class="h5">Nome:</p>
            <p class="form-control">{{$user->name}}</p>


            <h2 class="h5">Lista de funções</h2>
            {!! Form::model($user, ['route' => ['admin.users.update', $user],'method'=>'put' ]) !!}
                @foreach ($roles as $role)
                    <div>
                        <label>
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{$role->name}}
                        </label>
                    </div>
                @endforeach

                {!! Form::submit('Criar função', ['class' => 'btn btn-primary mt-2']) !!}

            {!! Form::close() !!}
            
        </div>
    </div>
   
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop