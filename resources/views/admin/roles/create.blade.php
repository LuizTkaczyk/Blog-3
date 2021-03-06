@extends('adminlte::page')

@section('title', 'Laravel')

@section('content_header')
    <h1>Criar nova função</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.roles.store']) !!}
                
                @include('admin.roles.partials.form')

                {!! Form::submit('Criar função', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
